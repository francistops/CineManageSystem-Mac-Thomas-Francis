 <?php
    require_once __DIR__ . '../../../../config.php';
    require_once APP_PATH . '/controllers/Films.php';

    function runTest($testName, $testFunction) {
        try {
            if ($testFunction()) {
                echo "PASSED: " . $testName . "\n";
            } else {
                echo "FAILED: " . $testName . "\n";
            }
        } catch (Throwable $e) {
            echo "ERROR: " . $testName . " - " . $e->getMessage() . "\n";
        }
    }

    runTest("Test get films from db", function() {
        $result = get_films();
        //echo var_dump($result);
        if (isset($result)) {
            return true;
        } else {
            return false;
        }
    });