    </div>
</main>
            <footer class="fixed-bottom p-3 
                <?php 
                    if(!empty($view)){
                        if($view=='test') echo 'test';
                        elseif($view=='corso') echo 'corso';
                        elseif($view=='exp') echo 'exp';
                    }else echo '';
                ?>
                ">
                Footer
            </footer>
        </div>
    </body>
</html>