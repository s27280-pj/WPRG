<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_people = $_POST['num_people'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $credit_card = $_POST['credit_card'];
    $email = $_POST['email'];
    $arrival_date = $_POST['arrival_date'];
    $arrival_time = $_POST['arrival_time'];
    $child_bed = isset($_POST['child_bed']) ? "Tak" : "Nie";
    $amenities = isset($_POST['amenities']) ? implode(", ", $_POST['amenities']) : "Brak";

    echo "<h2>Podsumowanie rezerwacji:</h2>";
    echo "<p>Liczba osób: $num_people</p>";
    echo "<p>Imię: $name</p>";
    echo "<p>Nazwisko: $surname</p>";
    echo "<p>Adres: $address</p>";
    echo "<p>Numer karty kredytowej: $credit_card</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Data przyjazdu: $arrival_date</p>";
    echo "<p>Godzina przyjazdu: $arrival_time</p>";
    echo "<p>Potrzeba łóżka dla dziecka: $child_bed</p>";
    echo "<p>Udogodnienia: $amenities</p>";

    if ($num_people > 1) {
        echo "<h3>Dane dodatkowych osób:</h3>";
        for ($i = 2; $i <= $num_people; $i++) {
            echo "<h4>Osoba $i:</h4>";
            echo "<p>Imię: <input type='text' name='name_$i' required></p>";
            echo "<p>Nazwisko: <input type='text' name='surname_$i' required></p>";
            // Dodaj więcej pól dla danych dodatkowych osób, jeśli potrzebne
        }
    }
} else {
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="num_people">Liczba osób:</label>
        <select name="num_people" id="num_people" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <label for="name">Imię:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="surname">Nazwisko:</label>
        <input type="text" name="surname" id="surname" required><br>
        <label for="address">Adres:</label>
        <input type="text" name="address" id="address" required><br>
        <label for="credit_card">Numer karty kredytowej:</label>
        <input type="text" name="credit_card" id="credit_card" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="arrival_date">Data przyjazdu:</label>
        <input type="date" name="arrival_date" id="arrival_date" required><br>
        <label for="arrival_time">Godzina przyjazdu:</label>
        <input type="time" name="arrival_time" id="arrival_time" required><br>
        <label for="child_bed">Potrzeba łóżka dla dziecka:</label>
        <input type="checkbox" name="child_bed" id="child_bed"><br>
        <label for="amenities">Udogodnienia:</label><br>
        <select name="amenities[]" id="amenities" multiple>
            <option value="klimatyzacja">Klimatyzacja</option>
            <option value="popielniczka">Popielniczka</option>
        </select><br>
        <input type="submit" value="Zarezerwuj">
    </form>
    <?php
}
?>
