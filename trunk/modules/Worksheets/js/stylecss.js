var headID = document.getElementsByTagName("head")[0];         
var cssNode = document.createElement('link');
cssNode.type = 'text/css';
cssNode.rel = 'stylesheet';
cssNode.href = 'modules/Worksheets/css/stylecss.css';
cssNode.media = 'screen';
headID.appendChild(cssNode);