<script>
    function validateForm(){
        var a=document.forms["addroom"]["type"].value;
            if (a==null || a==""){
                alert("Pls. Enter the product name");
                return false;
            }
        var b=document.forms["addroom"]["rate"].value;
            if (b==null || b==""){
                alert("Pls. Enter the product price");
                return false;
            }
        var d=document.forms["addroom"]["desc"].value;
            if (d==null || d==""){
                alert("Pls Enter the product description");
                return false;
            }
        var e=document.forms["addroom"]["image"].value;
            if (e==null || e==""){
                alert("Pls. upload an image");
                return false;
            }
    }
</script>

<style type="text/css">

.ed{
    border-style:solid;
    border-width:thin;
    border-color:#00CCFF;
    margin-bottom: 4px;
}
#button1{
    text-align:center;
    font-family:Arial, Helvetica, sans-serif;
    border-style:solid;
    border-width:thin;
    border-color:#00CCFF;
    padding:5px;
    background-color:#00CCFF;
    height: 34px;
}
</style>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

            return true;
    }
</script>

    <form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
        Name<br />
            <input name="type" type="text" class="ed" /><br />
        Category ID<br />
            <input name="category_id" type="text" class="ed" /><br />
        Rate<br />
            <input name="rate" type="text" id="rate" class="ed" onkeypress="return isNumberKey(event)" /><br />
        Description<br />
            <input name="description" type="text" class="ed" /><br />
        Upload Image: <br />
            <input type="file" name="image" class="ed"><br />

            <input type="submit" name="Submit" value="save" id="button1" />
    </form>
