<html>
<title>PitchPrint Sample SDK</title>
<head>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://pitchprint.io/rsc/js/client.js"></script>
</head>
<body>
<div id="pp_loader_div"><img src="https://pitchprint.io/rsc/images/loaders/spinner_new.svg" ></div>
<button id="launch_btn" >Launch Designer</button>
<div id="pp_preview_div"></div>
</body>
<script>
    (function() {
        //Get handles to the UI elements we'll be using
        var _launchButton = document.getElementById('launch_btn'),
            _previewDiv = document.getElementById('pp_preview_div'),
            _loaderDiv = document.getElementById('pp_loader_div');

        //Disable the Launch button until PitchPrint is ready for use
        _launchButton.setAttribute('disabled', 'disabled');


        /*Initialize PitchPrint.
            Kindly read more here on the options.. https://docs.pitchprint.com
        */
        var ppclient = new PitchPrintClient({
            apiKey: '8bec100647cdc362da9f0f6ca5a2171c',		//Kinldy provide your own APIKey
            designId: '*4765f9e89c98c915717619e38f05dbf9',	//Change this to your designId
            custom: true
        });

        //Function to run once the app is validated (ready to be used)
        var appValidated = () => {
            _launchButton.removeAttribute('disabled');				//Enable the Launch button
            _launchButton.onclick = () => ppclient.showApp();		//Attach event listener to the button when clicked to show the app
            _loaderDiv.style.display = 'none';						//Hide the loader
        };

        //Function to run once the user has saved their project
        var projectSaved = (_val) => {
            let _data = _val.data;									//You can console.log the _data varaible to see all that's passed down
            if (_data && _data.previews && _data.previews.length) {
                _previewDiv.innerHTML = _data.previews.reduce((_str, _prev) => `${_str}<img src="${_prev}">`, '');		//Show the preview images
            }
        };

        //Attach events to the app. You can see a list of all the events here: https://docs.pitchprint.com
        ppclient.on('app-validated', appValidated);
        ppclient.on('project-saved', projectSaved);
    })();
</script>
<input id="uni_cpo_wysokoscbaneru-field" >
<input id="uni_cpo_szerokoscbaneru2-field" >
</html>
