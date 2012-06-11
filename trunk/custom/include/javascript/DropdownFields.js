function updateDropdownFields(field) {
	for(targetFieldName in updateDropdownFieldsDefs[field.name][field.value]) {
		if(typeof(defaultValuesDefs) != 'undefined' && defaultValuesDefs[targetFieldName]) {
			var defaultValues = defaultValuesDefs[targetFieldName].split("^,^");
		}

		var targetField = document.getElementById(targetFieldName);
		var newDropdownOptions = SUGAR.language.get('app_list_strings', updateDropdownFieldsDefs[field.name][field.value][targetFieldName]);

		if(targetField.options.length > 0) {
			for(i = targetField.options.length - 1 ; i >= 0; i--) {
				targetField.remove(i);
			}
		}

		if(newDropdownOptions != 'undefined') {
			for(i in newDropdownOptions) {
				var selectedOption = false;

				if(defaultValues) {
					for(j = 0; j < defaultValues.length; j++) {
						if(defaultValues[j] == i) {
							selectedOption = true;
							break;
						}
					}
				}

				opt = new Option(newDropdownOptions[i], i, selectedOption, selectedOption);
				targetField.options[targetField.options.length] = opt;
			}
		}
	}
}
