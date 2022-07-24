<!DOCTYPE html>
<html>
    <body>
        
         
        <p id="demo"> </p>

        <script>
            var i=0;
            var txt = 'Join Us Now!';
            var speed = 90;

            function typeWriter(){
                if (i <= txt.length) 
                {
                    document.getElementById("demo").innerHTML += txt.charAt(i); 
                    i++;
                    setTimeout(typeWriter, speed);
                }
            }
            window.onload =typeWriter()
            </script>
            </body>
            </html>
