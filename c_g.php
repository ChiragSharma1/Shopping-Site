<!DOCTYPE html>  
<html>  
<head>  
    <title>Using JavaScript how to Create Captcha</title>  
    <script type="text/javascript">  
        /* Function to Generat Captcha */  
        function GenerateCaptcha() {  
            var chr1 = Math.ceil(Math.random() * 10) + '';  
            var chr2 = Math.ceil(Math.random() * 10) + '';  
            var chr3 = Math.ceil(Math.random() * 10) + '';  
  
            var str = new Array(4).join().replace(/(.|$)/g, function () { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });  
            var captchaCode = str + chr1 + ' ' + chr2 + ' ' + chr3;  
            document.getElementById("txtCaptcha").value = captchaCode  
        }  
  
        /* Validating Captcha Function */  
        function ValidCaptcha() {  
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);  
            var str2 = removeSpaces(document.getElementById('txtCompare').value);  
  
            if (str1 == str2) return true;  
            return false;  
        }  
  
        /* Remove spaces from Captcha Code */  
        function removeSpaces(string) {  
            return string.split(' ').join('');  
        }  
    </script>  
  
</head>  
<body onload="GenerateCaptcha();">  
    <div style="border: 2px solid gray; width: 700px;">  
        <h2>Generating Captcha Demo</h2>  
  
        Enter the Captcha Text:  
        <input type="text" id="txtCompare" />  
        <input type="text" id="txtCaptcha" style="text-align: center; border: none; font-weight: bold; font-size: 20px; font-family: Modern" />  
        <input type="button" id="btnrefresh" value="Refresh" onclick="GenerateCaptcha();" />  
        <input id="btnValid" type="button" value="Check" onclick="alert(ValidCaptcha());" />  
  
        <br />  
        <br />  
    </div>  
</body>  
</html>