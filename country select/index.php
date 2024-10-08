<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COUNTRY SELCET</title>
    <link rel="stylesheet" href="style.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

</head>
<body>
   <div id="main">
        <div id="header">
            <h1>Dynamic Dependent Select Box in <br> PHP & jQuery Ajax</h1>
        </div>
        <div id="content">
            <form action="">
                <label>Country : </label>
                <select id="country">
                    <option value="">Select Country</option>
                </select>
                <br><br>
                <label>State : </label>
                <select id="state">
                    <option value="">Select State</option>
                </select>
            </form>
        </div>
   </div>


   <script type="text/javascript">
    $(document).ready(function(){
        function loadtable(type, category_id){
            $.ajax({
                url : "load-cs.php",
                type : "POST",
                data : {type : type, id : category_id},
                success : function(data){
                    if(type == "stateData"){
                        $("#state").html(data);
                    }else{
                        $("#country").append(data);
                    }
                    
                }
            });
        }

        loadtable();


        $("#country").on("change", function(){
            var country = $("#country").val();

            loadtable("stateData", country);           

        });

    });
   </script>


</body>
</html>