<!DOCTYPE Html>
<html>
<head>
    <title>Szamologep</title>
    <meta charset="utf-8" />
    <style>
        table {
            border: none;
        }

        td {
            padding: 10px;
            border: none;
            text-align: center;
            align-content: center;
        }

        select {
            padding: 5px;
            box-sizing: border-box;
            margin: 0 auto;
        }

        p {
            font-size: 22px;
            margin-bottom: -3px;
        }

        em {
            color: red;
        }

    </style>

</head>

<body>
    <h2>Számológép</h2>

    <form method="post">
        <table>
            <tr>
                <td><label for="elso">Első szám:</label></td>
                <td><button type="submit">Számíts!</button></td>
                <td><label for="masodik">Második szám:</label></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" id="elso" name="elso" required /></td>
                <td>
                    <select id="operator" name="operator">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </td>
                <td><input type="text" id="masodik" name="masodik" required /></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $elso = $_POST["elso"];
    $masodik = $_POST["masodik"];
    $operator = $_POST["operator"];

    if (is_numeric($elso) && is_numeric($masodik)) {
        $elso = (double) $elso;
        $masodik = (double) $masodik;
        $eredmeny = null;

        switch ($operator) {
            case "+":
                $eredmeny = $elso + $masodik;
                break;
            case "-":
                $eredmeny = $elso - $masodik;
                break;
            case "*":
                $eredmeny = $elso * $masodik;
                break;
            case "/":
                if ($masodik == 0) {
                    $eredmeny = "∞";
                } else {
                    $eredmeny = $elso / $masodik;
                }
                break;
            default:
                echo "Ismeretlen művelet!";
                exit;
        }

        if ($eredmeny != null) {
            echo "<p>=$eredmeny</p>";
        }
    } else {
        echo "<em>Kérem számokat adjon meg!</em>";
    }

}
?>