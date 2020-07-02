<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peperoni App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
     
	    $(document).ready(function(){
		$('.editPizza').on('click',function(){
			$('#updatePizza');
			$tr = $(this).closest('tr');
			var data = $tr.children('td').map(function(){
				return $(this).text();

			}).get();

			$('#id').val(data[0]);
			$('#name').val(data[1]);
			$('#ingredients').val(data[2]);
			$('#price').val(data[3]);
		});
	        });
        });
    </script>
    
    <?= $this->renderSection('content') ?>
</body>
</html>