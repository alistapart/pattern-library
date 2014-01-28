// Adds class of js to the html tag if JS is enabled
document.getElementsByTagName('html')[0].className += ' js';

// Adds class of svg to the html tag if svg is enabled
(function flagSVG() {
    var ns = {'svg': 'http://www.w3.org/2000/svg'};
    if(document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1")) {document.getElementsByTagName('html')[0].className += ' svg';}
})();

(function (document, undefined) {
    // Pattern selector
    document.getElementById('pattern-submit').style.display = 'none';
    document.getElementById('pattern-select').onchange = function() {
        //document.location=this.options[this.selectedIndex].value;
        var val = this.value;
        if (val !== "") {
            window.location = val;
        }
    }
})(document);