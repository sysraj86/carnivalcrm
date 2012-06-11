function toggleRequiredFields(field) {
	if(field) {
		var value;

		if(field.type == 'checkbox') {
			value = (field.checked) ? 1 : 0;
		} else if(field.type == 'select-one' || field.type == 'select-multiple') {
			value = field.value;
		} else if(field.type == 'text') {
			value = (field.value == '') ? 0 : 1;
		}

		for(targetField in requiredFieldsDefs[field.name][value]) {
			var required = requiredFieldsDefs[field.name][value][targetField]['required'];
			var tmpLabel = requiredFieldsDefs[field.name][value][targetField]['label'];

			label = SUGAR.language.get('mod_strings', tmpLabel);
			
			if(label == 'undefined') {
				label = SUGAR.language.get('app_strings', tmpLabel);
			}

			for(i in validate[field.form.id]) {
				if(validate[field.form.id][i][0] == targetField) {
					var tf = document.getElementById(targetField);

					if(required && (tf.type == 'select-multiple' || tf.type == 'select') && tf.options.length == 0) {
						required = false;
					}
					
					validate[field.form.id][i][2] = required;
					
					if(required) {
						document.getElementById(targetField + '_label').innerHTML = label + ' ' + spanRequired;
					} else {
						document.getElementById(targetField + '_label').innerHTML = label;
					}
				}
			}
		}
	}
}
