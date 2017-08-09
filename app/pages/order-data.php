<div class="container">

    <?php
        echo "<pre>";
            print_r($_POST);
        echo "</pre>";
    ?>

	<div class="row">
        <h2>Gib deine Daten für die Bestellung ein</h2>
        <hr>
		<form action="?p=order-data&action=customer_data" method="post">

            <div class="form-group">
                <label for="firstname">Vorname</label>
                <input type="text" class="form-control" name="customer_data[firstname]" id="firstname"
                       placeholder="Input...">
            </div>
            <div class="form-group">
                <label for="lastname">Nachname</label>
                <input type="text" class="form-control" name="customer_data[lastname]" id="lastname"
                       placeholder="Input...">
            </div>
            <div class="form-group">
                <label for="email">E-Mail-Adresse</label>
                <input type="text" class="form-control" name="customer_data[email]" id="email"
                       placeholder="Input...">
            </div>

            <div class="form-group">
                <label for="street">Straße</label>
                <input type="text" class="form-control" name="customer_data[street]" id="street"
                       placeholder="Input...">
            </div>

            <div class="form-group">
                <label for="postcode">Postleitzahl</label>
                <input type="text" class="form-control" name="customer_data[postcode]" id="postcode"
                       placeholder="Input...">
            </div>

            <div class="form-group">
                <label for="city">Stadt</label>
                <input type="text" class="form-control" name="customer_data[city]" id="city"
                       placeholder="Input...">
            </div>

            <input type="submit" name="submit" class="btn btn-success" value="Weiter zur Überprüfung der Bestellung">


        </form>

	</div>

</div>