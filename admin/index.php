
<?php include('Parties/menu.php') ?>

    <div class="main-content">
        <div class="container">
            <h1>Dashboard</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                catégories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                catégories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                catégories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br/>
                catégories
            </div>

            <div class="clearfix"></div>
        
        </div>
    </div>

<?php include('Parties/footer.php'); ?>