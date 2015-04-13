var loginID;

function Widget() {};
Widget.prototype.setValue = function() {throw "setValue not implemented";};

/** Widget for handling selection of persons */
function SelectPersonWidget(component, model) {	
	this.component = component;
	var widget = this;
	this.name = widget.component.attr("data-variable");
	
	// Setup select person ui components
	widget.component.html("");
						
	// Add an autocomplete component
	var input = $(document.createElement("input"));
	input.attr("type","text");
	input.attr("name", widget.name);					
	widget.component.append(input);
						
	// Add a div to show the selected person
	var nameDiv = $(document.createElement("div"));
	nameDiv.addClass("variableObserver");					
	nameDiv.attr("data-variable", widget.name);
	widget.component.append(nameDiv);
	
	// Add a div for remove person button
	var removeDiv = $(document.createElement("div"));
	removeDiv.addClass("removePersonButton");
	widget.component.append(removeDiv);
	removeDiv.button({
		icons: {primary: "ui-icon-cancel"}, text: false}).click(function() {	

		if (model.getValue(widget.name).value == model.getValue("personid")) {
			// Trying to remove the user him/herself
			$("#dialog-confirm-remove-self-from-team").dialog({
				modal: true,
				resizable: false,
				buttons: {
					"Remove": function() {
						widget.component.removeClass("personSelected");
						model.valueChanged(widget.name, null);					
						$( this ).dialog( "close" );				
					},
					Cancel: function() {
						$( this ).dialog( "close" );			
					}
				}
			});				
		} else {
			widget.component.removeClass("personSelected");
			model.valueChanged(widget.name, null);
		}
	});
	
	var rex = new RegExp("teamB([0-9]+)_(.+)");
	var result = rex.exec(widget.name);
	var operation = "players";
	if (result != null) {		
		var event = "B" + result[1];
		var position = result[2];
		if (position == "lead")
			operation = "leaders";
	}	
	
	// Convert the added input to autocomplete field
	input.autocomplete({
		minLength: 3,
		source: function(request, response) {
			$.ajax("gate.php", {
					dataType: "html",
					data: {
						loginid: loginID,										
						operation: operation,
						"event": event,
						term: request.term
					},
					type: 'POST'
			})
			.done(function(data) {
				response(jQuery.parseJSON(data));
			});
		}, 
		select: function(event, ui) {
			if (ui.item) {
				// A new person was selected
				if (model.valueChanged(widget.name, {label: ui.item.value, value: Number(ui.item.personid)})) {
					// Update was successful
					widget.component.addClass("personSelected");
				}				
				$(this).val("");
			} 
			return false;
		}
	});	
		
	this.setValue = function(value) {
		widget.component.find("input").first().attr("value","");
		if (value != null) {
			// The name of the person is assigned through the variable observer framework
			widget.component.addClass("personSelected");
		} else {
			widget.component.removeClass("personSelected");
		}
	};
	return this;	
};
SelectPersonWidget.prototype = new Widget();

/** Widget for handling input type="text" and textarea */
function TextInputWidget(component, model) {
	this.component = component;
	var name = component.attr("data-variable");
	component.change(function() {
		model.valueChanged(name, component.val());
	});	
	
	this.setValue = function(value) {
		this.component.val((value)?value:"");
	};
};
TextInputWidget.prototype = new Widget();

/** Widget for handling select inputs */
function SelectInputWidget(component, model) {
	this.component = component;
	var name = component.attr("data-variable");
	component.change(function() {
		model.valueChanged(name, component.val());
	});	
	
	this.setValue = function(value) {
		value = (value)?value:"";
		var DOM = this.component.get(0);
		index = 0;
		for(var j = 0; j < DOM.options.length; j++) {
			if(DOM.options[j].value == value) {
				index = j;
				break;
			}
		}
		DOM.selectedIndex = index;
	};	
};
SelectInputWidget.prototype = new Widget();

/** A multiple choice widget that is constructed out of divs. */
function MultipleChoiceWidget(component, model) {
	this.components = new Object();
	var widget = this;
	var name = component.attr("data-variable");
	
	this.addComponent = function(component) {	

		var value = component.attr("data-value");
		if (!value) {
			// When data-value is omitted, assume the intention is to have a single selection "checkbox"
			value = "yes";
			component.attr("data-value","yes");
		}		
		this.components[value] = component;
		
		// Make the component look like a button
		component.mouseenter(function() {component.addClass("ui-state-hover");});
		component.mouseleave(function() {component.removeClass("ui-state-hover");});		
		component.addClass("ui-state-default").addClass("ui-button").addClass("ui-corner-all");
		
		component.mouseup(function(event) {
			if (model.values[name] == value) {
				// Unselect other options
				for(key in widget.components) {
					widget.components[key].removeClass("ui-state-active");
				}
				
				// Unselect the option
				model.valueChanged(name, null);
			} else {				
				for(key in widget.components) {
					if (key == value)
						widget.components[key].addClass("ui-state-active");
					else 
						// Unselect other options
						widget.components[key].removeClass("ui-state-active");
				}
				
				model.valueChanged(name, value);
			}
			event.preventDefault();
			return false;
		});	
		component.mousedown(function(event) {
			event.preventDefault();
			return false;
		});
	};
	
	this.setValue = function(value) {
		for(key in this.components) {
			if (key == value)
				this.components[key].addClass("ui-state-active");
			else 
				// Unselect other options
				this.components[key].removeClass("ui-state-active");
		}			
		
	};
};
MultipleChoiceWidget.prototype = new Widget();


function GlobalModel() {
	// Needed to access "this" in subcontexts
	var mdl = this; 
	mdl.variables = new Object();	
	mdl.values = new Object();
	mdl.effects = new Array();
			
	$(".requireValue").each(function() {
		// The default for required values is "yes"
		var comp = $(this);			
		if (!comp.attr("data-value")) {
			comp.attr("data-value","yes");
		}
	});
			
	$(".variable").each(function() {
		var comp = $(this);
		var name = comp.attr("data-variable");
		var variable = mdl.variables[name];
		
		if (!variable) {	
			// New variable
			variable = {
				name: name,
				enabled: true,
				rules: new Array(),
				effects: new Array()};
		
			mdl.values[name] = null;
			mdl.variables[name] = variable;
		}
		
		if (comp.attr("name") == undefined) 
			comp.attr("name", name);
		
		if (comp.attr("id") == undefined)
			comp.attr("id", name);
		
		
		if ((comp.is("input") && (comp.attr("type") == "text")) || (comp.is("textarea"))) {
			variable.widget = new TextInputWidget(comp, mdl);
		} else if (comp.is("select")) {
			variable.widget = new SelectInputWidget(comp, mdl);
		} else if (comp.is("div")) {
			if (comp.hasClass("selectPerson")) {
				variable.widget = new SelectPersonWidget(comp, mdl);
			} else {
				// Divs are assumed selection variables
				if (!(variable.widget)) {
					variable.widget = new MultipleChoiceWidget(comp, mdl);
				}
				variable.widget.addComponent(comp);
			}
		};
		
		// Initialize error messages to default type if type missing.
		$('.variableErrorMessage[data-variable=\"' + name +'\"]').each(function() {
			var comp = $(this);
			if (!comp.attr("data-type")) {
				comp.attr("data-type","*");
			}
		});			
	});
	
	mdl.addVariable = function(name) {
		// Allows to create variables that are not directly attached to the output			
		
		// New variable.
		variable = {
			name: name,
			enabled: true,
			widget: null,
			rules: new Array(),
			effects: new Array()};
		
		mdl.values[name] = null;
		mdl.variables[name] = variable;
	};

	mdl.testRules = function(name) {
		var variable = mdl.variables[name];
		if (!variable.enabled)
			// No rules are broken for disabled variables
			return true;
			
		var value = mdl.values[name];
		var accept = true;
		var brokenRule;
		$.each(variable.rules, function() {
			if (this.test(value) == false) {
				// The rule test returned exactly false. undefined and null are not equal to false
				$('.variableErrorMessage[data-variable=\"' + name +'\"][data-type=\"' + this.type + '\"]').each(function() {
					$(this).addClass("error");
				});
				accept = false;	
			}
			return accept;
		});
		
		if (!accept) {
			// At least one rule was broken 
			$('.variable[data-variable=\"' + name +'\"]').each(function() {$(this).addClass("inputError");});
		} else {
			// No rules were broken. Remove error messages.
			$('.variable[data-variable=\"' + name +'\"]').each(function() {$(this).removeClass("inputError");});
			$('.variableErrorMessage[data-variable=\"' + name +'\"]').each(function() {$(this).removeClass("error");});
		}		
		
		return accept;
	};
	
	// Invoked by the user controlled widgets
	mdl.valueChanged = function(name, value) {			
		var variable = mdl.variables[name];	
		
		// The assumption is that variables changed by the widgets are always enabled
		if (!variable.enabled) 
			throw "Variable " + name + " is disabled and when it should not be.";
			
		mdl.values[name] = value;
		
		var accept = mdl.testRules(name);
		
		// Iterate through value effects
		$.each(variable.effects, function() {(mdl.effects[this])();});
		
		// Update observers
		mdl.updateObservers(name, value);
		
		return accept;	
	};
	
	// Invoked by effects and inner functions to change the value of a variable
	mdl.setValue = function(name, value) {
		var variable = mdl.variables[name];				

		// Rules are ignored when changing the values from within				
		mdl.values[name] = value;
		
		// Iterate through value effects
		$.each(variable.effects, function() {(mdl.effects[this])();});
		
		// Update observers
		mdl.updateObservers(name, value);
		
		// Propagate the values to the widget (view)
		if (variable.widget)
			variable.widget.setValue(value);
	};
	
	mdl.getValue = function(name) {
		// Disabled values are undefined
		if (!(mdl.variables[name]) || !(mdl.variables[name].enabled))
			return undefined;
		
		return mdl.values[name];
	};
	
	mdl.isEnabled = function(name) {
		return (mdl.variables[name] && mdl.variables[name].enabled);
	};
	
	mdl.updateObservers = function(name, value) {		
		if (value && (typeof(value) == "object")) {
			// SelectPersonWidgets have objects as value
			value = value.label;
		}
		$('.variableObserver[data-variable=\"' + name +'\"]').each(function() {
			$(this).html(value);
		});
		
		$('.requireValue[data-variable=\"' + name +'\"]').each(function() {
			var rval = $(this).attr('data-value');				
			
			var inv = false;
			if (rval[0] == '!') {
				rval = rval.substring(1);
				inv = true;
			}
			if (rval == 'null') {
				truth = (value == null) || (value == []) || (value == undefined);
			} else {
				truth = value == rval;
			}
			if (inv) 
				truth = !truth;
			
			if (truth) {
				$(this).removeClass('disabled');
			} else {
				$(this).addClass('disabled');
			}
		});		
	};
	
	mdl.addRule = function(name, test, type) {
		var rule = new Object();
		rule.test = test;
		rule.type = type || '*';
		mdl.variables[name].rules.push(rule);
	};
	
	mdl.addEffect = function(variables, effect) {
		// Store a single copy of the effect
		var index = mdl.effects.length;
		mdl.effects.push(effect);
		$.each(variables, function() {
			// Point the variables that cause the effect to that single copy of effects
			mdl.variables[this].effects.push(index);
			//variable.effects.push(index);
		});
		// This allows us to iterate through all effects at once, invoking each effect once.
		// This becomes necessary when loading all values from the server
	};		
	
	mdl.applyEffects = function() {
		// Iterate through value rules 
		$.each(mdl.effects, function() { this();});
	};			
	
	mdl.setEnabled = function(name, enabled) {
		if (mdl.variables[name].enabled == enabled)
			// Prevent infinite recursions
			return;
			
		mdl.variables[name].enabled = enabled;
		
		if (enabled) {
			$('.variable[data-variable=\"' + name + '\"]').each(function() {$(this).removeClass('disabled')});
			$('.requireEnabled[data-variable=\"' + name + '\"]').each(function() {$(this).removeClass('disabled')});
			$('.requireDisabled[data-variable=\"' + name + '\"]').each(function() {$(this).addClass('disabled')});
			$('.variableObserver[data-variable=\"' + name + '\"]').each(function() {$(this).removeClass('disabled')});
			mdl.setValue(name, null);		
//			$('.variable[data-variable=\"' + name + '\"]').show();
//			mdl.updateObservers(name, null);
		} else {
			// When disabiling, reset the variable
			mdl.setValue(name, null);		
			$('.variable[data-variable=\"' + name + '\"]').each(function() {$(this).addClass('disabled').removeClass('inputError');});
			$('.variableErrorMessage[data-variable=\"' + name + '\"]').each(function() {$(this).removeClass('error');});
			$('.requireEnabled[data-variable=\"' + name + '\"]').each(function() {$(this).addClass('disabled')});
			$('.requireDisabled[data-variable=\"' + name + '\"]').each(function() {$(this).removeClass('disabled')});
			$('.requireValue[data-variable=\"' + name + '\"]').each(function() {$(this).addClass('disabled')});
			$('.variableObserver[data-variable=\"' + name + '\"]').each(function() {$(this).addClass('disabled')});
//			$('.variable[data-variable=\"' + name + '\"]').hide();
		}			
	};
	
	mdl.useResponse = function(response) {
		var isJSON = false;
		try {
			// Test if the result is JSON
			var values = jQuery.parseJSON(response);
			//console.log(values);
			isJSON = true;
		} catch (exception) {
			$('#submitStatus').append(exception);					
		}
		if (isJSON && typeof(values) == "object") {
			$('#submitStatus').append(" applying JSON data.");					

			// We received a valid construct of the values
			for (var name in values) {
				mdl.values[name] = values[name];
			}
			
			// Apply all effects. Assumption is that a single iteration 
			// will produce a consistent dataset.
			mdl.applyEffects();
								
			// Update views
			for (var name in mdl.values) {						
				var value = mdl.values[name];
				
				// Update observers
				mdl.updateObservers(name, value);

				// Propagate the values to the widget (view)
				var variable = mdl.variables[name];
				if (variable && variable.widget)
					variable.widget.setValue(value);
			}	
		}
	};
	
	// Store to server routines
	mdl.store = function(operation) {	
		$("#submitStatus").html(operation + "...");
		console.log(JSON.stringify(mdl.values));
		$.ajax("gate.php", {
				dataType: "html",
				data: {
					loginid: loginID,
					operation: operation,
					data: JSON.stringify(mdl.values)
				},
				type: 'POST',
		})
		.done(function(response) {
			if (operation == "submit") {
				location.href = "gate.php?loginid="+loginID+"&page=showreport";
			}
			mdl.useResponse(response);
			$("#submitStatus").html(response+"done");
		})
		.fail(function(jqXHR, type, errorObj) {
				$("#submitStatus").html(type + "<br />"+errorObj);
		});
		
		
	};
	
	mdl.retract = function() {
		$("#submitStatus").html("retracting...");				
		$.ajax("gate.php", {
				dataType: "html",
				data: {
					loginid: loginID,
					operation: "retract"
				},
				type: 'POST',
		})
		.done(function(response) {
			mdl.useResponse(response);
			$("#submitStatus").html(response+"done");
		})
		.fail(function(jqXHR, type, errorObj) {
				$("#submitStatus").html(type + "<br />"+errorObj);
		});		
	};
	
	mdl.fetch = function() {
		$("#submitStatus").html("fetching...");		
		$.ajax("gate.php", {
				dataType: "html",
				data: {
					loginid: loginID,
					operation: "fetch",
				},
				type: 'POST',
		})
		.done(function(response) {
			$("#submitStatus").html("Response: " + response);				
			
		//	mdl.useResponse(response);
			$("#loadingPage").hide();
			pages.openPage("personalPage"); 
			$('#submitStatus').append(" Opening personal page.");						
		})
		.fail(function(jqXHR, type, errorObj) {
				$("#submitStatus").html(type + "<br />"+errorObj);
		});			
	};

};	

function Pages() {
	pgs = this;
	this.all = new Array();
	this.names = new Object();
	this.current = -1;
	
	/* Populate page information */
	$('.navigation a').each(function() {
		var comp = $(this);
		var page = {
			target: comp.attr("data-target"),
			enabled: true,
			menuItem: comp.parent()};
		pgs.all.push(page);
		var index = pgs.all.length - 1;
		// For easy access
		pgs.names[page.target] = index;
		
		comp.click(function(event) {
			event.preventDefault();		
			return (page.enabled) && pgs.openPage(index);
		});
	});
	
	this.openPage  = function(index) {

		if (typeof index == "string") {
			index = pgs.names[index];
		}
		
		if (index == pgs.current)
			// No need to open the current page.
			return false;
		
		if (!pgs.all[index].enabled) {
			// Don't open disabled pages
			return false;
		}
		
		// Test rules
		var proceed = true;
		if (pgs.current >= 0) {
			var current = pgs.all[pgs.current];
			$('#' + current.target).find(".variable").each(function() {
				var name = $(this).attr("data-variable");
				// Test all rules on the variable
				proceed &= model.testRules(name);
			});
			
			if (!proceed) {				
				// Don't open another page until all rules are satisfied
				return false;
			}
			
			$('#' + current.target).hide();
			current.menuItem.removeClass('opened');	
		}
		
			
		pgs.current = index;	
		current = pgs.all[index];
		$('#' + current.target).show();
		pgs.all[index].menuItem.addClass('opened');
		
		
		if (index == pgs.all.length-1) {
			// Hide the next button when we are at the last page.
			$("#nextButton").hide();
			if (model.getValue("status") == "Submitted") {
				$("#retractButton").show();
			}
			$("#submitButton").show();
			$("#saveButton").show();
		} else {
			$("#nextButton").show();
			$("#submitButton").hide();
			$("#retractButton").hide();
			$("#saveButton").hide();
		}
		if (index == 0) {
			// Hide the prev button when we are at the last page.
			$("#prevButton").hide();
		} else {
			$("#prevButton").show();
		}
				
		return true;
	};
	
	this.setEnabled = function(index, enable) {
		if (typeof index == "string") {
			index = pgs.names[index];
		}
		var page = pgs.all[index];
		if (enable) {
			page.enabled = true;
			page.menuItem.removeClass('disabled');
			
		} else {
			if (index == pgs.current) {
				alert("Maximum badness: current page is being disabled.");
				return;
			}
			page.enabled = false;
			page.menuItem.addClass('disabled');
		}		
	}
	
	this.nextPage = function() {
		var index = pgs.current+1;
		while (index < pgs.all.length && !pgs.all[index].enabled) ++index;
		if (index == pgs.all.length) {
			alert("Maximum bad. �ber trouble. And no marmelade. index=\\infty");
			return;
		}
		pgs.openPage(index);	
	};
	
	this.prevPage = function() {
		var index = pgs.current-1;
		while (index >= 0 && !pgs.all[index].enabled) --index;
		if (index == -1) {
			alert("Maximum bad. �ber trouble. And no marmelade. index==-1");
			return;
		}
		pgs.openPage(index);
	};
};


var eventRules = [
	// Event code, sex, min birth year, max year, min belt, max belt, all inclusive
	["F1", "male", 0, 2003, -2, 10],
	["F2", "female", 0, 2003, -2, 10],
	["F3", "male", 0, 1999, -2, 10],
	["F4", "female", 0, 1999, -2, 10],
	["F5", "male", 0, 2015, -6, -3],
	["F6", "female", 0, 2015, -6, -3],
	["F7", "male", 0, 1999, -6, -3],
	["F8", "female", 0, 1999, -6, -3],
	["F9", "*", 2006, 2008, -9, 10],
	["F10", "*", 2003, 2005, -9, 10],
	["F11", "male", 2003, 2005, -9, 10],
	["F12", "female", 2003, 2005, -9, 10],
	["F13", "*", 2000, 2002, -9, 10],
	["F14", "male", 2000, 2002, -6, 10],
	["F15", "female", 2000, 2002, -6, 10],
	["F16", "*", 0, 1980, -6, -3],
	["F17", "*", 0, 1980, -2, 10],
	["F18", "male", 0, 1980, -2, 10],
	["F19", "female", 0, 1980, -2, 10],
	["F20", "*", 0, 2003, -9, 10],
	["F21", "male", 0, 1999, -4, 10],
	["F22", "female", 0, 1999, -4, 10],
	["F23", "*", 0, 2003, -9, 10],
	["F24", "*", 0, 2015, -9, 10],
	];	
	
var model, pages;		
	
//$(window).bind("load", function() {
$(function () {

	// Find out the login id
	var regex = new RegExp("[\\?&]loginid=([^&#]*)");
	var result = regex.exec(window.location.search);
	if (result == null) {
		alert("Could not find id in URL. Cannot proceed.");
		return;
	} else {
		loginID = result[1];
	}

	/* Content verifiers */
	model = new GlobalModel();
	pages = new Pages();

	// Add slots to variables that are supplied by the server and not modified by the UI
	model.addVariable("emailAddress");
	model.addVariable("personid");
	model.addVariable("role");
	model.addVariable("manager");
	model.setValue("optionalBanquette", false);
	model.setValue("optionalHoodie", false);
	model.setValue("optionalIFGticket", false);
	model.setValue("optionalJudgeSeminars", false);
	model.setValue("optionalKidsSeminars", false);
	model.setValue("optionalSeminars", false);
	model.setValue("optionalTshirt", false);
	model.setValue("optionalWTCticket", false);
	model.fetch();	
	
	
	//model.setValue("taidoRank", "");
	
	// Control buttons
	$("#nextButton").button().click(function() {pages.nextPage();});
	$("#prevButton").button().click(function() {pages.prevPage();});
	$("#retractButton").button().click(function(event) {
		$("#dialog-confirm-retract").dialog({
			modal: true,
			resizable: false,
			buttons: {
				"Retract": function() {
					model.retract();
					$( this ).dialog( "close" );				
				},
				Cancel: function() {
					$( this ).dialog( "close" );			
				}
			}
		});
	});
	$("#submitButton").button().click(function(event) {
		$("#dialog-confirm-submit").dialog({
			modal: true,
			resizable: false,
			buttons: {
				"Submit": function() {
					model.store("submit");
					$( this ).dialog( "close" );				
				},
				Cancel: function() {
					$( this ).dialog( "close" );			
				}
			}
		});	
	});
	
	
	/*model.addEffect(["manager"], function() {
		if (model.getValue("manager") == 1) {
			// For managers, remove all the ability to choose a nationality
			//$('.variable[data-variable="nationality"][data-value!="' + model.getValue("nationality") +'"]').remove();
		}
	});
	*/
//	$("#saveButton").button().click(function(event) {model.store("cache");});
	
	model.addRule("nationality", function(value) {return value != null;});
	model.addEffect(["nationality"], function() {
		// Nationality has to be japanese to show input for ganji names
		model.setEnabled("firstNameGanji", model.getValue("nationality") == "japanese");		
		model.setEnabled("lastNameGanji", model.getValue("nationality") == "japanese");		
	});
	
	model.addRule("firstName", function(value) {return ((value != undefined) && (value != null) && (value != []));});
	model.addRule("lastName", function(value) {return ((value != undefined) && (value != null) && (value != []));});
	model.addRule("firstNameGanji", function(value) {
		return ((value != undefined) && (value != null) && (value != []));
	});
	model.addRule("lastNameGanji", function(value) {
		return ((value != undefined) && (value != null) && (value != []));
	});
	
	// Ensure birthdays are correct 
	model.addRule("birthDay", function(value) {return ((value >= 1) && (value <= 31));});
	model.addRule("birthMonth", function(value) {return ((value >= 1) && (value <= 12));});
	model.addRule("birthYear", function(value) {return ((value >= 1800) && (value <= 2015));});
	
	// Show toggle for shinsa only if the person has 4 dan or above
	model.addRule("taidoRank", function(value) { return (value != undefined) && (value != []) && (value != null);});
	
	model.addEffect(["taidoRank"], function() {
		model.setEnabled("renshi", model.getValue("taidoRank") >= 4 && model.getValue("taidoRank") < 6);
        model.setEnabled("kyoshi", model.getValue("taidoRank") >= 6 && model.getValue("taidoRank") < 8);
        model.setEnabled("hanshi", model.getValue("taidoRank") >= 8);
	});	
	
	model.addEffect(["birthYear", "package", "kidspackage"], function() {
	    model.setEnabled("role", (model.getValue("birthYear") <= 2003 ? true:false));
		model.setEnabled("kidspackage", (model.getValue("birthYear") <= 2003 ? false:true));
	});
	// Cost for international friendship games
	model.addVariable("ifgCost");
	var events = new Array();
	for(var i = 0; i < eventRules.length; ++i) {
		events.push("event"+eventRules[i][0]);
	}
	
	model.addEffect(events, function() {
		var selected = false;
		for(var i = 0; i < eventRules.length && !selected; ++i) {
		    if (i != 10) {
			selected |= model.getValue("event"+eventRules[i][0]) == "yes";
			}
		}
	
		model.setValue("ifgCost",(selected)?350:0);		
	});
	
	model.addEffect(["package", "ifgCost"], function () {

	/*	switch (model.getValue("package")) {
		case "Tourist": model.setValue("ifgCost", 0); break;
		}*/
	});
	// Age alerts for events
	var eventRuleAlerts = ["F3", "F4", "F7", "F8", "F19", "F21", "F22"];
	for (var i = 0; i < eventRuleAlerts.length; ++i) {
		var event = "event"+eventRuleAlerts[i];
		var func = function(event) {
			return function() {
				if (model.getValue("birthYear") >= 1995 && model.getValue("birthYear") <= 1999 && 
					model.getValue(event) == "yes") {
					$("#"+event+"warning").removeClass("disabled");
				} else {
					$("#"+event+"warning").addClass("disabled");
				}
			};
		};
		model.addEffect([event, "birthYear"], func(event));
	}
	
	
	model.addRule("sex", function(value) {return ((value != undefined) && (value != null) && (value != []));});	
	
	model.addEffect(["role", "package", "manager"], function() {
	    model.setEnabled("manager", ((model.getValue("package") == "WTC Competitor") || (model.getValue("role") == "wtc")));
		
	});
	// Ensure judging is allowed only in specific situations
	model.addEffect(["taidoRank", "ifgCost", "role", "package", "willComplete4dan"], function() {
		var truth = (model.getValue("taidoRank") >= 1) && !(model.getValue("ifgCost") > 0) && !(model.getValue("role") == "staff") && !(model.getValue("package") == "Tourist") && !(model.getValue("package") == "Staff");
		model.setEnabled("ifgJudge", truth);
		pages.setEnabled("judgePage", truth);
		truth &= (model.getValue("taidoRank") >= 4) || ((model.getValue("taidoRank") == 3) && (model.getValue("willComplete4dan") == "yes"));
		truth &= (model.getValue("role") != "wtc");
		model.setEnabled("wtcJudge", truth);
	});
		
	// Allow volunteer work only when no overlapping events are selected
	model.addEffect(["ifgCost", "role", "ifgJudge", "wtcJudge", "package","birthYear"], function () {
		var occupied028 = (model.getValue("ifgCost") > 0) || (model.getValue("ifgJudge") == "yes") || (model.getValue("role")=="staff") || (model.getValue("package") =="WTC Competitor" || (model.getValue("birthYear") > 1997));;
		model.setEnabled("volunteer", !occupied028);
		pages.setEnabled("volunteerPage", !occupied028);
	//	model.setEnabled("volunteerSecurity028", !occupied028);		
		
		var occupied038 = (model.getValue("role") == "wtc") || (model.getValue("wtcJudge") == "yes") || (model.getValue("role")=="staff");
	//	model.setEnabled("volunteerKiosk038", !occupied038);
	//	model.setEnabled("volunteerSecurity038", !occupied038);		
	//	model.setEnabled("volunteerIT038", !occupied038);		
	});
		
        model.addEffect(["package"], function () {
		pages.setEnabled("optionalPage", !(model.getValue("package") == "WTC Competitor"));
	});
	// Children of at most 12 have a cheaper tourist package
	model.addEffect(["birthYear"], function() {
		if (model.getValue("birthYear") >= 2001) {		
			$("#touristPrice").html("1350 SEK");
			$("#wtcTicketPrice").html("50 SEK");
		} else {
			$("#touristPrice").html("1350 SEK");
			$("#wtcTicketPrice").html("100 SEK");
		}
	});

	

	// Enabled events that the person is allowed to enroll
	model.addEffect(["taidoRank", "sex", "birthYear", "package", "ifgJudge", "wtcJudge", "eventF19", "eventF20", "eventF21", "eventF22", "eventF23"], function() {	
		var sex = model.getValue("sex");
		var rank = model.getValue("taidoRank");
		var birthYear = Number(model.getValue("birthYear"));
		
		var disableAll = 
			// WTC Competitors are not allowed to participate in IFG. 
			(model.getValue("role") == "wtc") ||
			(model.getValue("role") == "etc") ||
			(model.getValue("package") == "WTC Competitor") ||
			// Staffs are not allowed to compete in IFG
			(model.getValue("role") == "staff") ||
			// A judge is required to be IFG judge, and hence they can't participate in IFG.
			(model.getValue("package") == "Judge") ||
			(model.getValue("ifgJudge") == "yes") ||
			(model.getValue("wtcJudge") == "yes") ||
			// Sex has to be selected
			!(sex == "male" || sex == "female") ||
			// The person must have a taido rank. Rank of 0 means doesn't practice.
			!(rank < 0 || rank > 0);
/*		if (disableAll && model.isEnabled("ifgCost")) {
			model.setEnabled("ifgCost", false);
		} else if (!disableAll && !model.isEnabled("ifgCost")) {
			model.setEnabled("ifgCost", true);
		}*/
		for(var i = 0; i < eventRules.length; ++i) {
			if (!disableAll && // 0 rank means no taido rank
				(eventRules[i][1] == "*" || (eventRules[i][1] == sex)) &&
				(eventRules[i][2] <= birthYear) && (birthYear <= eventRules[i][3]) &&
				(eventRules[i][4] <= rank) && (rank <= eventRules[i][5])) {
				
				// Suitable for this person
				model.setEnabled("event"+eventRules[i][0], true);
			} else {
				// Not suitable, block
				model.setEnabled("event"+eventRules[i][0], false);
			}			
		}
		pages.setEnabled("ifgEventsPage",!disableAll);
		if (!disableAll) {
			var truth = model.getValue("eventF19") == "yes";
			truth |= model.getValue("eventF20") == "yes";
			truth |= model.getValue("eventF21") == "yes";
			truth |= model.getValue("eventF22") == "yes";		
			truth |= model.getValue("eventF23") == "yes";		
			pages.setEnabled("ifgTeamsPage", truth);
		} else {
			pages.setEnabled("ifgTeamsPage", false);		
		}
		
	});
	
	// Package cost
	model.addVariable("packageCost");
	model.addEffect(["package"], function() {
		var cost = 0;
		var value = model.getValue("package");		
		var includesHotel = true;
		switch (value) {
		case "WTC Competitor": cost = 1400; break;
		case "Tourist": cost = 1350; break;
		case "Judge": cost = 1150; break;
		case "Volunteer": cost = 0; break;
        case "kids": cost = 400; break;
		case "Staff": cost = 900; 
			includesHotel = true;
			break;
		default: cost = 0;
		}
		model.setValue("packageCost", cost);
		model.setEnabled("diet", value != null && value != undefined);
		model.setEnabled("hotel38",includesHotel);
		model.setEnabled("hotel48",includesHotel);
		model.setEnabled("hotel58",includesHotel);
		model.setEnabled("hotel68",value != "Staff");
		model.setEnabled("hotel78",value != "Staff");
		model.setEnabled("hotel88",value != "Staff");
		model.setEnabled("hotel98",includesHotel);
	});
	
	// Add warnings about empty team members	
	model.addEffect(["teamB19_p1", "teamB19_p2", "teamB19_p3", "teamB19_p4", "teamB19_p5", "eventF20"], function() {		
		// SelectPersonWidget stores an object as value when a person is selected, otherwise it is null
		if (model.getValue("eventF20") == "yes") {
			var nr = 0;
			var teamNames = ["teamB19_p1", "teamB19_p2", "teamB19_p3", "teamB19_p4", "teamB19_p5"];			
			$.each(teamNames, function() {
				if (model.getValue(this)) 
					++nr;
			});
			if (nr < teamNames.length)
				$("#eventF20playerMissing").removeClass("disabled");
			else 
				$("#eventF20playerMissing").addClass("disabled");
		} else {
			$("#eventF20playerMissing").addClass("disabled");
		}
	});
	
	model.addEffect(["teamB20_p1", "teamB20_p2", "teamB20_p3", "teamB20_p4", "teamB20_p5", "teamB20_lead", "eventF21"], function() {		
		// SelectPersonWidget stores an object as value when a person is selected, otherwise it is null
		if (model.getValue("eventF21") == "yes") {
			var nr = 0;
			var teamNames = ["teamB20_p1", "teamB20_p2", "teamB20_p3", "teamB20_p4", "teamB20_p5", "teamB20_lead"];
			$.each(teamNames, function() {
				if (model.getValue(this)) 
					++nr;
			});
			if (nr < teamNames.length)
				$("#eventF21playerMissing").removeClass("disabled");
			else 
				$("#eventF21playerMissing").addClass("disabled");
		} else {
			$("#eventF21playerMissing").addClass("disabled");
		}
	});
	
	model.addEffect(["teamB21_p1", "teamB21_p2", "teamB21_p3", "teamB21_p4", "teamB21_p5", "teamB21_lead", "eventF22"], function() {		
		// SelectPersonWidget stores an object as value when a person is selected, otherwise it is null
		if (model.getValue("eventF22") == "yes") {
			var nr = 0;
			var teamNames = ["teamB21_p1", "teamB21_p2", "teamB21_p3", "teamB21_p4", "teamB21_p5", "teamB21_lead"];
			$.each(teamNames, function() {
				if (model.getValue(this)) 
					++nr;
			});
			if (nr < teamNames.length)
				$("#eventF22playerMissing").removeClass("disabled");
			else 
				$("#eventF22playerMissing").addClass("disabled");
		} else {
			$("#eventF22playerMissing").addClass("disabled");
		}
	});
	
	model.addEffect(["teamB22_p1", "teamB22_p2", "teamB22_p3", "teamB22_p4", "teamB22_p5", "teamB22_p6", "eventF23"], function() {		
		// SelectPersonWidget stores an object as value when a person is selected, otherwise it is null
		if (model.getValue("eventF23") == "yes") {
			var nr = 0;
			var teamNames = ["teamB22_p1", "teamB22_p2", "teamB22_p3", "teamB22_p4", "teamB22_p5", "teamB22_p6"];
			$.each(teamNames, function() {
				if (model.getValue(this)) 
					++nr;
			});
			if (nr < teamNames.length)
				$("#eventF23playerMissing").removeClass("disabled");
			else 
				$("#eventF23playerMissing").addClass("disabled");
		} else {
			$("#eventF23playerMissing").addClass("disabled");
		}
	});
	
	// IFG teams must have names
	var teamNameTest = function(value, event) {
		$("#team" + event + "_nameok").hide();
		if (model.getValue("event" + event) != "yes") {
			// Ignore if event is not selected.
			$("#event" + event + "teamRemove").addClass("disabled");
			return true;
		}
		if (!value || (value.length < 1)) {
			$("#event" + event + "teamRemove").removeClass("disabled");
			// Empty name is considered as a removal of the team
			return true;
		}
		if (value.length < 4)
			// A non-empty name must be of valid length
			return false;
		$("#event" + event + "teamRemove").addClass("disabled");
		
		$("#team" + event + "_loading").css("display","inline-block");
		var matches;
		var url = 'gate.php?loginid=' + loginID + '&operation=teamname';
		url += '&event=' + event + '&name=' + escape(value);
		var id = model.getValue("team"+event+"_id");
		if (id) {
			url += "&teamid=" + id;
		}
		
		$.ajax({
				url:   url,
				success: function(response) {
						matches = parseInt(response);
					},
				error: function(jqXHR, type, errorObj) {
					$("#submitStatus").html(type + "<br />"+errorObj);
					},	
				async:   false
			});       
		if (matches == undefined) {
			alert("Could not connect to server. Try again later.");
		} else if (matches == 0) {
			$("#team" + event + "_nameok").css("display","inline-block");			
		}
		$("#team" + event + "_loading").hide();
		return (matches == 0);
	};
	
	model.addVariable("teamB19_id"); model.addVariable("teamB20_id"); 
	model.addVariable("teamB21_id"); model.addVariable("teamB22_id");
	
	model.addRule("teamB19_name", function(value) { return teamNameTest(value, "B19");});
	model.addRule("teamB20_name", function(value) { return teamNameTest(value, "B20");});
	model.addRule("teamB21_name", function(value) { return teamNameTest(value, "B21");});
	model.addRule("teamB22_name", function(value) { return teamNameTest(value, "B22");});
	
	// A WTC judge must also be a IFG judge
	model.addEffect(["ifgJudge"], function() {		
		if ((model.getValue("ifgJudge") != "yes") && (model.getValue("wtcJudge") == "yes")) {
			model.setValue("wtcJudge",null);
		}
	});
	model.addEffect(["wtcJudge"], function() {
		if ((model.getValue("wtcJudge") == "yes") && (model.getValue("ifgJudge") != "yes")) {
			model.setValue("ifgJudge","yes");
		}
	});
	var judgeVariables = ["judgeNationalSeminars", "judgeInternationalSeminars", "judgeNationalCount", "judgeIFGCount", "judgeECCount", "judgeWCCount"];
	model.addEffect(["wtcJudge", "ifgJudge", "nationality"], function() {	
		if ((model.getValue("nationality") == "finnish") && 
			(model.getValue("wtcJudge") == "yes" || model.getValue("ifgJudge") == "yes")) {
			$.each(judgeVariables, function() { model.setEnabled(this, true);});
		} else {
			$.each(judgeVariables, function() { model.setEnabled(this, false);});		
		}
	});
	$.each(judgeVariables, function() {
		model.addRule(this, function(value) {
			return ((value != null) && (value >= 0) && (value <= 10000));
		});
	});
	
	model.addVariable("hotelCost");
	model.addEffect(["hotel38", "hotel48", "hotel58", "hotel68", "hotel78", "hotel88", "roomType", "package"], function() {
		var type = model.getValue("roomType");
		var pernight = 0;
		switch (type) 
		{
			case "Standard Single": pernight = 1300; break;
			case "Standard Double": pernight = 2200; break;
			case "Cabin": pernight = 2300; break;
		}
		var nights = 0;
		nights += (model.getValue("hotel38") == "yes");
		nights += (model.getValue("hotel48") == "yes");
		nights += (model.getValue("hotel58") == "yes");
		nights += (model.getValue("hotel68") == "yes");
		nights += (model.getValue("hotel78") == "yes");
		nights += (model.getValue("hotel88") == "yes");
		
		var hasStaff = model.getValue("package")=="Staff";
		model.setEnabled("roomType", nights > 0);
		model.setEnabled("address", nights > 0 || hasStaff);
		model.setEnabled("passportNumber", nights > 0  || hasStaff);
		model.setEnabled("hotelAccompany", (nights > 0  || hasStaff) && (type != "Standard Single") );
		model.setEnabled("separateBeds", (nights > 0  || hasStaff) && (type != "Standard Single") );
		if (hasStaff && (nights == 0))
			model.setValue("hotelCost", "0 ");
		else 
			model.setValue("hotelCost", nights*pernight);
		
	});
	
	model.addRule("address",function(value) {
		return (value != null) && (value != "");
	});
	
	model.addRule("passportNumber",function(value) {
		return (value != null) && (value != "");
	});
	
	model.addRule("roomType",function(value) {
		return (value != null);
	});
	
	
	model.addVariable("readableTaidoRank");
	model.addEffect(["taidoRank"], function(value) {
		var rank = model.getValue("taidoRank");
		if (rank < 0) {
			model.setValue("readableTaidoRank", (-rank) + " kyu");
		} else if (rank > 0) {
			model.setValue("readableTaidoRank", rank + " dan");
		} else {
			model.setValue("readableTaidoRank", "don't practice");
		}
	});
	
	model.addEffect(["package", "role"], function(value) {
		model.setEnabled("optionalBanquette", (!(model.getValue("package"))) || (model.getValue("package")=="Volunteer"));
		model.setEnabled("optionalWTCticket", (!(model.getValue("package")) || (model.getValue("package")=="Volunteer")) && (model.getValue("role") != "wtc"));
		model.setEnabled("optionalIFGticket", (!(model.getValue("package")) || (model.getValue("package")=="Volunteer")) && (model.getValue("role") != "ifg"));
	});		
	
	model.addVariable("optionalsCost");
	model.addEffect(["optionalBanquette", "optionalWTCticket", "optionalIFGticket", "optionalJudgeSeminars", "optionalSeminars", "optionalKidsSeminars", "optionalTshirt", "optionalHoodie"], function() {
		var cost = 0;
		cost += (model.getValue("optionalBanquette") == "yes")?600:0;
		cost += (model.getValue("optionalWTCticket") == "yes")?100:0;
		cost += (model.getValue("optionalIFGticket") == "yes")?50:0;
		cost += (model.getValue("optionalJudgeSeminars") == "yes")?300:0;
		cost += (model.getValue("optionalSeminars") == "yes")?400:0;
		cost += (model.getValue("optionalKidsSeminars") == "yes")?250:0;
		cost += (model.getValue("optionalTshirt") == "yes")?150:0;
		cost += (model.getValue("optionalHoodie") == "yes")?350:0;

		model.setValue("optionalsCost",cost);
	});

	// Add effects to calculate total cost
	model.addVariable("totalCost");
	model.addEffect(["packageCost", "ifgCost", "hotelCost", "optionalsCost"], function() {
		var cost = Number(model.getValue("packageCost"));
		//cost += Number(model.getValue("ifgCost"));
		cost += Number(model.getValue("hotelCost"));
		cost += Number(model.getValue("optionalsCost"));
		
		model.setValue("totalCost",cost);
	});	

	// Data status variables
	model.addVariable("modified");
	model.setValue("modified","Never");
	model.addVariable("status");
	model.setValue("status","Not submitted");	
	
//	openPage("loadingPage");
/*	model.setEnabled("firstNameGanji",false);
	model.setEnabled("lastNameGanji",false);
	model.setEnabled("renshi",false);
	*/
	
	model.fetch();	
	
	
/*	// Cache data every 5 minutes
	setInterval(function() {
		model.store("cache");
	}, 60*1000);*/
	
});