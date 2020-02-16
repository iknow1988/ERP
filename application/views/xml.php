<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Untitled Page</title>
    <script>
function ok_click() {
    var xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
    xmlDoc.async = false;
    xmlDoc.load("data.xml");
    //if (xmlDoc.readyState == 4 && xmlDoc.parseError.errorCode == 0) {
        //var root = xmlDoc.documentElement;
        //var _input_name = xmlDoc.createTextNode(document.reg.name_input.value);
        //var _input_pass = xmlDoc.createTextNode(document.reg.pass_input.value);
        //var input_name = xmlDoc.createNode(1, "USER", "");
        //var input_pass = xmlDoc.createNode(1, "PASS", "");
        //input_name.appendChild(_input_name);
        //input_pass.appendChild(_input_pass);

        //var cust = xmlDoc.createNode(1, "CUST", "");
        //cust.appendChild(input_name);
        //cust.appendChild(input_pass);

        //root.appendChild(cust);

        //SaveXML(xmlDoc, "<?php echo base_url();?>data.xml");
        alert("Save!");
    //}
}

function SaveXML(xmlDoc, filename) {
    var outputXML = new String(xmlDoc.xml);
    var mfObj = new ActiveXObject("Scripting.FileSystemObject");
    var absPath = getPath();
    var file = mfObj.CreateTextFile(absPath + filename, true);
    file.Write(outputXML);
    file.Close();
}

function getPath() {
    var path = document.location;
    var str = new String(path);
    var end = str.lastIndexOf("/");
    var absolutePath = str.substring(8, end) + "/";
    absolutePath = absolutePath.replace(/%20/g, " ");
    return absolutePath;
}
</script>
</head>
<body>
    <form name="reg" action="xml.php" method="get">
    Name:
    <input type="text" name="name_input" />
    Pass:
    <input type="text" name="pass_input" />
    <input type="button" value="OK" onclick="javascript:ok_click();" />
    </form>
</body>
</html>
