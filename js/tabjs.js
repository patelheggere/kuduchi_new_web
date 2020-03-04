
function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
    
            $(function () {
                $("#datepicker").datepicker();
                $("#icon").click(function () {
                    $("#datepicker").datepicker("show");
                })
            });

            $(document).ready(function () {
                var village = ["ಕುಡಚಿ",
                    "ಗುಂಡವಾಡ",
                    "ಶಿರಗೂರ",
                    "ಖೇಮಲಾಪೂರ",
                    "ಸಿದ್ದಾಪೂರ",
                    "ಪರಮಾನಂದವಾಡಿ",
                    "ಯಲ್ಪಾರಟ್ಟಿ",
                    "ಯಬರಟ್ಟಿ",
                    "ಕೋಳಿಗುಡ್ಡ",
                    "ಹಾರೂಗೇರಿ",
                    "ಬಡಬ್ಯಾಕೂಡ",
                    "ಅಲಖನೂರ",
                    "ಸುಟ್ಟಟ್ಟಿ",
                    "ನಿಲಜಿ",
                    "ಮೊರಬ",
                    "ಬೆಕ್ಕೇರಿ",
                    "ನಿಡಗುಂದಿ",
                    "ಅಳಗವಾಡಿ",
                    "ಬಸ್ತವಾಡ",
                    "ಖನದಾಳ",
                    "ಇಟನಾಳ",
                    "ಸವಸುದ್ದಿ",
                    "ದೇವಾಪೂರಹಟ್ಟಿ",
                    "ಕಟಕಬಾವಿ",
                    "ಹಿಡಕಲ್",
                    "ಮುಗಳಖೋಡ",
                    "ಪಾಲಬಾಂವಿ",
                    "ಸುಲ್ತಾನಪೂರ",
                    "ಕಪ್ಪಲಗುದ್ದಿ",
                    "ಹಂದಿಗುಂದ",
                    "ಮರಾಕುಡಿ"];
                $("#village").select2({
                    data: village
                });
            });

            function myFunction() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            function filterFunction() {
                var input, filter, ul, li, a, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                div = document.getElementById("myDropdown");
                a = div.getElementsByTagName("a");
                for (i = 0; i < a.length; i++) {
                    if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        a[i].style.display = "none";
                    }
                }
            }

            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
   