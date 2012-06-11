function toggleVisibleFields(field) {
	if(field) {
		var value;

		if(field.type == 'checkbox') {
			value = (field.checked) ? 1 : 0;
		} else if(field.type == 'select-one' || field.type == 'select-multiple') {
			value = field.value;
		} else if(field.type == 'text') {
			value = (field.value == '') ? 0 : 1;
		}

		for(target in visibileFieldsDefs[field.name][value]) {
			var targetField = document.getElementById(target);
			var targetLabel = document.getElementById(target + '_label');

			if(visibileFieldsDefs[field.name][value][target]['visible'] == 1) {
				targetField.style.display = 'inline';
				targetField.style.visibility = 'visible';
				targetLabel.style.display = 'inline';
				targetLabel.style.visibility = 'visible';
			} else {
				targetField.style.display = 'inline';
				targetField.style.visibility = 'hidden';
				targetLabel.style.display = 'inline';
				targetLabel.style.visibility = 'hidden';
			}
		}
	}
}
