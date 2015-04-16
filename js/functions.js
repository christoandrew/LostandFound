/**
 * Created by abel on 4/10/2015.
 */
function populateCategories(xmlDataIn) {
    var xmldata = xmlDataIn.getElementsByTagName('Category');
    if(xmldata.length <= 0) { // check for data
        alert("Data Unavailable");
        return;
    }
    for(var i = 0; i < xmldata.length; i++) {
        var catid = '';
        var catname = '';
        var x, y;
        x = xmlDataIn.getElementsByTagName('id')[i]; // get manufacturer id
        y = x.childNodes[0];
        catid = y.nodeValue;
        x = xmlDataIn.getElementsByTagName('name')[i]; // get manufacturer name
        y = x.childNodes[0];
        catname = y.nodeValue;
        var newOption = new Option(catname, catid, false, false);
        window.document.getElementById('category').options.add(newOption);
    }
}
function populateSubcategories(xmlDataIn) {
    var xmldata = xmlDataIn.getElementsByTagName('SubCategory');
    if(xmldata.length <= 0) {
        alert("Data Unavailable");
        return;
    }
    window.document.getElementById('subcategory').options.length = 0;
    var firstOption = new Option('--Choose A Subcategory--', '', false, false);
    window.document.getElementById('subcategory').options.add(firstOption);
    for(var i = 0; i < xmldata.length; i++) {
        var typeid = '';
        var typename = '';
        var x, y;
        x = xmlDataIn.getElementsByTagName('id')[i]; // get type id
        y = x.childNodes[0];
        typeid = y.nodeValue;
        x = xmlDataIn.getElementsByTagName('name')[i];
        y = x.childNodes[0];
        typename = y.nodeValue;
        var newOption = new Option(typename, typeid, false, false);
        window.document.getElementById('subcategory').options.add(newOption);
    }
    window.document.getElementById('subcategory').disabled = false;
}
function populateBrands(xmlDataIn) {
    var xmldata = xmlDataIn.getElementsByTagName('Brand');
    if(xmldata.length <= 0) {
        alert("Data Unavailable");
        return;
    }
    window.document.getElementById('brand').options.length = 0;
    var firstOption = new Option('--Choose A Brand--', '', false, false);
    window.document.getElementById('brand').options.add(firstOption);
    for(var i = 0; i < xmldata.length; i++) {
        var typeid = '';
        var typename = '';
        var x, y;
        x = xmlDataIn.getElementsByTagName('id')[i]; // get type id
        y = x.childNodes[0];
        typeid = y.nodeValue;
        x = xmlDataIn.getElementsByTagName('name')[i];
        y = x.childNodes[0];
        typename = y.nodeValue;
        var newOption = new Option(typename, typeid, false, false);
        window.document.getElementById('brand').options.add(newOption);
    }
    window.document.getElementById('brand').disabled = false;
}
function getValue(elementname) {
    returnvalue = window.document.getElementById(elementname).value;
    //alert('value: '+returnvalue);
    return returnvalue;
}
function resetValues() {
    var typeOption = new Option('-Choose A Subcategory--', '', false, false);
    var brandOption = new Option('--Choose A Category/Subcategory--', '', false, false);
    window.document.getElementById('subcategory').options.length = 0;
    window.document.getElementById('subcategory').options.add(typeOption);
    window.document.getElementById('subcategory').disabled = true;
    window.document.getElementById('brand').options.length = 0;
    window.document.getElementById('brand').options.add(brandOption);
    window.document.getElementById('brand').disabled = true;

}