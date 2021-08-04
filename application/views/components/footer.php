</main>
<?php 
        echo '<footer class="fixed-bottom p-3 ';
        if(!empty($view)){
            if($view=='test') echo 'test">';
            elseif($view=='corso') echo 'corso">';
            elseif($view=='exp') echo 'exp">';
        }else echo '">';
    ?>




                Footer
            </footer>
        </div>
    </body>
</html>