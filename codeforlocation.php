<div style="border: 1px solid #ccc; padding: 1rem; border-radius: 5px;">
    <h2 style="margin-bottom: 1rem;">Find By Address or Coordinates</h2>
    <div style="display: flex; justify-content: space-around;">
        <div>
            <h3 style="margin-bottom: 1rem;">Find address</h3>
            <form method="POST">
                <p>
                    <label for="address">Enter address:</label>
                    <input type="text" name="address" id="address" style="padding: 0.5rem; border-radius: 5px; border: 1px solid #ccc;">
                </p>
                <p>
                    <button type="submit" name="submit_address" style="background-color: #4CAF50; color: white; padding: 0.5rem 1rem; border-radius: 5px; border: none; cursor: pointer;">Find</button>
                </p>
            </form>
        </div>
        
        <div>
            <h3 style="margin-bottom: 1rem;">Find coordinates</h3>
            <form method="POST">
                <p>
                    <label for="latitude">Enter latitude:</label>
                    <input type="text" name="latitude" id="latitude" style="padding: 0.5rem; border-radius: 5px; border: 1px solid #ccc;">
                </p>
                <p>
                    <label for="longitude">Enter longitude:</label>
                    <input type="text" name="longitude" id="longitude" style="padding: 0.5rem; border-radius: 5px; border: 1px solid #ccc;">
                </p>
                <p>
                    <button type="submit" name="submit_coordinates" style="background-color: #4CAF50; color: white; padding: 0.5rem 1rem; border-radius: 5px; border: none; cursor: pointer;">Find</button>
                </p>
            </form>
        </div>
    </div>

    <div style="margin-top: 2rem;">
        <?php
        if (isset($_POST["submit_address"]))
        {
            $address = $_POST["address"];
            $address = str_replace(" ", "+", $address);
            ?>
            <h3 style="margin-bottom: 1rem;">Address found:</h3>
            <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed" style="border: none;"></iframe>
        <?php
        }
        elseif (isset($_POST["submit_coordinates"]))
        {
            $latitude = $_POST["latitude"];
            $longitude = $_POST["longitude"];
            ?>
            <h3 style="margin-bottom: 1rem;">Coordinates found:</h3>
            <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed" style="border: none;"></iframe>
        <?php
        }
        ?>
    </div>
    
    <div style="margin-top: 2rem;">
        <p style="font-size: 12px;">Current date and time: <?php echo date('Y-m-d H:i:s'); ?></p>
    </div>
</div
