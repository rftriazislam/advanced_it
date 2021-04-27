<!DOCTYPE html>
<html lang="en">

<head>
	<title>MathType for CKEditor | Math & Science</title>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="math,science" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Rich HTML editor to create">
	<meta name="author" content="WIRIS">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript">
		if (window.location.search !== '') {
		    var urlParams = window.location.search;
		    if (urlParams[0] == '?') {
		        urlParams = urlParams.substr(1, urlParams.length);
		        urlParams = urlParams.split('&');
		        for (i = 0; i < urlParams.length; i = i + 1) {
		            var paramVariableName = urlParams[i].split('=')[0];
		            if (paramVariableName === 'language') {
		                _wrs_int_langCode = urlParams[i].split('=')[1];
		                break;
		            }
		        }
		    }
		}
    </script>
	<!-- Editor Plugin -->
	<link type="text/css" rel="stylesheet" href="''"/>
	<script type="text/javascript" src="{{asset('back_end/editor')}}/math_ckeditor/ckeditor4/ckeditor.js"></script>

	<!-- Style for html code -->
	<link type="text/css" rel="stylesheet" href="{{asset('back_end/editor')}}/math_ckeditor/css/prism.css" />

	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Roboto Font -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- Extra -->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />


</head>

<body>



		
			
			
					
					<textarea name="editor1" id="c1" rows="10" cols="80">
                      This is my textarea to be replaced with CKEditor.
                    </textarea>
					
					<textarea name="editor1" id="c2" rows="10" cols="80">
                      This is my textarea to be replaced with CKEditor.
                    </textarea>
				<textarea name="editor1" id="c3" rows="10" cols="80">
                      This is my textarea to be replaced with CKEditor.
                    </textarea>
					
					<textarea name="editor1" id="c4" rows="10" cols="80">
                      This is my textarea to be replaced with CKEditor.
                    </textarea>

		<!-- Prism JS script to beautify the HTML code -->
		<script type="text/javascript" src="{{asset('back_end/editor')}}/math_ckeditor/js/prism.js"></script>

		<!-- WIRIS script -->
		<script type="text/javascript" src="{{asset('back_end/editor')}}/math_ckeditor/js/wirislib.js"></script>

			<!-- Google Analytics -->
		<script src="{{asset('back_end/editor')}}/math_ckeditor/js/google_analytics.js"></script>

		<script>
			if(typeof urlParams !== 'undefined') {
				var selectLang = document.getElementById('lang_select');
				selectLang.value = urlParams[1];
			}
			
			
			
			 // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
           CKEDITOR.replace( 'c1');
           CKEDITOR.replace('c2');
		    CKEDITOR.replace( 'c3');
           CKEDITOR.replace('c4');
		</script>

	</body>

	</html>