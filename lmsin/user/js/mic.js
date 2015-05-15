var state=false;
var recognition = new webkitSpeechRecognition();
var textarea;
var final_text;
var interim_text;
recognition.continuous = true;
recognition.interimResults = true;
recognition.lang = ['English',['en-US','United States']];

function capitalize(s) {
  	return s.replace(/\S/, function(m) { return m.toUpperCase(); });
}

recognition.onstart = function() {};
recognition.onresult = function(event) {
	textarea = document.getElementById('comment');
	final_text = '';
	interim_text = '';
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      	temp = event.results[i][0].transcript;
      	if (event.results[i].isFinal) {
       	 	final_text += temp;
      	}
      	else {
        	interim_text += temp;
      	}
    }
    //alert(textarea.innerHTML+"    "+final_text);
    textarea.value = textarea.value+((textarea.value=='')?capitalize(final_text):final_text);
};
recognition.onerror = function(event) {
	falseState();
};
recognition.onend = function() { 
	trueState();
};

function toggle() {
	if(!state) {
		trueState();
	}
	else {
		falseState();
	}
}

function trueState() {
	state=true;
	document.getElementById('mic').src = "images/mic-animate.gif";
	recognition.start();
}

function falseState() {
	state=false;
	document.getElementById('mic').src = "images/mic.gif";
	recognition.stop();
}