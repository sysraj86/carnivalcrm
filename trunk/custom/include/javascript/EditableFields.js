function toggleEditableFields(field) {
	var fieldValue;
	var fieldType;
	var isEditable;
	var fieldType;
	
	if(field) {
		if(field.type == 'checkbox') {
			fieldValue = (field.checked) ? 1 : 0;

			if(field.disabled) {
				return;
			}
		} else if(field.type == 'select-one' || field.type == 'select-multiple') {
			fieldValue = field.value;
		} else if(field.type == 'text') {
			fieldValue = (field.value == '') ? 0 : 1;
		}
		for(targetField in editableFieldsDefs[field.name][fieldValue]) {
			isEditable = editableFieldsDefs[field.name][fieldValue][targetField]['editable'];
			fieldType = editableFieldsDefs[field.name][fieldValue][targetField]['type'];
			objField = document.getElementById(targetField);

			if(objField) {
				if(fieldType == 'name' || fieldType == 'date' || fieldType == 'currency' || fieldType == 'varchar' || fieldType == 'int' || fieldType == 'text' || fieldType == 'float') {
					if(isEditable) {
						objField.readOnly = false;
						objField.style.background = '#ffffff';
					} else {
						objField.readOnly = true;
						objField.style.background = '#dddddd';
					}
				} else if(fieldType == 'bool') {
					if(isEditable) {
						objField.disabled = false;
						objField.style.background = '#ffffff';
					} else {
						objField.disabled = true;
						objField.style.background = '#dddddd';
					}
				} else if(fieldType == 'id' || fieldType == 'enum' || fieldType == 'multienum') {
					if(isEditable) {
						objField.disabled = false;
						objField.style.background = '#ffffff';
					} else {
						objField.disabled = true;
						objField.style.background = '#dddddd';
					}
				} else if(fieldType == 'relate') {
					if(isEditable) {
						objField.disabled = false;
						objField.style.background = '#ffffff';
					} else {
						objField.disabled = true;
						objField.style.background = '#dddddd';
					}

					var childElements = objField.parentNode.parentNode.getElementsByTagName('input');
					var btn = 'btn_' + targetField;
					var btn_clr = 'btn_clr_' + targetField;

					for(var i = 0; i < childElements.length; i++) {
						if(childElements[i].name == btn || childElements[i].name == btn_clr) {
							if(isEditable) {
								childElements[i].style.visibility='visible';
							} else {
								childElements[i].style.visibility='hidden';
							}
						}
					}
				}
			}
		}
	}
}
