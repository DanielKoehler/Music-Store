window.onload = function () {
    var switches = document.getElementsByClassName('switch');
    for (var i = switches.length - 1; i >= 0; i--) { //
        switches[i].addEventListener('click', function (){
            var switchContainer = event.target.parentNode;
            if(switchContainer.className == 'switch-on')
            {
                switchContainer.className = 'switch-off';
            } else {
                switchContainer.className = 'switch-on';
            }
            var input = switchContainer.getElementsByTagName('input')[0];
            console.log(switchContainer.className)
        });
    };
}