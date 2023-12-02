<?php

function footer($credit){
    echo "
        <footer id='footer'>
            <p class='footer__text'>
                © All copyrights are reserved 2023. Design by <span class='text-bold'>{$credit}</span>.
            </p>
        </footer>
    ";
}