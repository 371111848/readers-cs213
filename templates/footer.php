
                </main>
            </div>
        </div>
        <div class="alerts">
        <?php foreach ($page_alerts as $alert) : ?>
            <div class="alert alert-<?=$alert[0]?> alert-dismissible fade show" role="alert">
              <?=$alert[1]?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php endforeach; $page_alerts = array();?>
        </div>
        <script
  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript" src="/assets/js/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="/assets/js/main.js"></script>
        
    </body>
</html>