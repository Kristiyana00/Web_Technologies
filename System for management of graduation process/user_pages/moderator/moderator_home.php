<?php
session_start();

if (!isset($_SESSION["user"]) || !isset($_SESSION["role"]) || (isset($_SESSION["role"]) && $_SESSION["role"] != "moderator")) {
    header('Location: ../../index.php');
    exit;
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <link href="moderator_home.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/ee112817f8.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta charset="UTF-8">
</head>

<body>
    <img class="logo" src="../../Images/su-logo.png" alt="su-logo">
    <p class="su-header">СУ "СВ. КЛИМЕНТ ОХРИДСКИ"</p>
    <div class="navigation">
        <h2 class="navigation_element" id="diploma_header" onclick="showDiplomaSection()">ДИПЛОМИРАНЕ</h2>
        <div class="vertical_line"></div>
        

        <h2 class="navigation_element" id="logout_header"><a href="../../services/logout.php" class="logout_header_link">ИЗХОД <i class="fas fa-sign-out-alt"></i></a></h2>
    </div>
    <div class="row">

       

        

        

        


        <div id="diploma_section">
            <h3><i class="fas fa-list"></i> Списък студенти</h3>
            <div id="filters">
            <input id="searchByName" placeholder="Търсене по име" onchange="filterActivate()"></input>
            <input id="searchByFn" placeholder="Търсене по факултетен номер" onchange="filterActivate()"></input>
            </div>
            <table class="diploma-table" id="diploma-table">
                <tr>
                    <td>№</td>
                    <td>ФН</td>
                    <td>Име</td>
                    <td>Степен</td>
                    <td>Спец.</td>
                    <td>Група</td>
                    <td>Успех</td>
                    <td>Присъствие</td>
                    <td>Има право</td>
                    <td>Готова</td>
                    <td>Взета</td>
                    <td>Заявка взимане предв.</td>
                    <td>Коментар (студент)</td>
                    <td>Взета предв.</td>
                    <td>Дата/час</td>
                    <td>Коментар (администр.)</td>
                    <td>Покана реч</td>
                    <td>Отговор</td>
                    <td>Снимки</td>
                    <td>Заявена тога</td>
                    <td>Взета</td>
                    <td>Дата/час</td>
                    <td>Върната</td>
                    <td>Дата/час</td>
                    <td>Заявена шапка</td>
                    <td>Взета</td>
                    <td>Дата/час</td>
                    <td>Върната</td>
                    <td>Дата/час</td>
                </tr>
            </table>
            <h3><i class="fas fa-user-edit"></i> Редактиране </h3>
            <form class="dashboard" id="dashboard">
                <textarea class="dashboard-textarea-fn" name="dashboard-textarea" id="dashboard_textarea" placeholder="Факуктетни номера (отделени със запетая)"></textarea>
                <select class="dashboard-action" id="dashboard_action" onchange="showDashboardAdditionalInputElement(this.value)">
                    <option value="" selected disabled hidden>Изберете действие...</option>
                    <option value="1">Право на диплома</option>
                    <option value="2">Готова диплома</option>
                    <option value="3">Взета</option>
                    <option value="4">Взета предварително</option>
                    <option value="5">Коментар</option>
                    <option value="6">Покана за реч</option>
                    <option value="7">Взета тога</option>
                    <option value="8">Върната тога</option>
                    <option value="9">Взета шапка</option>
                    <option value="10">Върната шапка</option>
                </select>
                <select class="boolean-select-after-select" id="boolean_select_after_select">
                    <option value="" selected disabled hidden>Изберете стойност...</option>
                    <option value="Да">Да</option>
                    <option value="Не">Не</option>
                </select>
                <textarea class="textarea-after-select" id="textarea_after_select" placeholder="Коментар..."></textarea>
                <button type="submit" id="submit_action" class="submit-action" onclick="submitAction(event)">Запази <i class="far fa-save"></i></i></button>
            </form>
            <p class="message-bar" id='message-bar-diploma'></p>

        </div>

    </div>
    <div class="row diploma_order_section" id="diploma_order_section">
        <h3><i class="fas fa-user-graduate"></i> Пореден списък за връчване на дипломи</h3>
        <form id="diploma_order_form">
            <select id="diploma_order_1" name="diploma_order_1" class="diploma_order_select" onchange="removeValueFromOtherLists(this)">
                <option value="-1" selected disabled hidden>Параметър 1</option>
                <option value="fn">ФН</option>
                <option value="name">Име</option>
                <option value="degree">Степен</option>
                <option value="major">Специалност</option>
                <option value="group">Група</option>
                <option value="grade">Успех</option>
            </select>
            <select id="diploma_order_2" name="diploma_order_2" class="diploma_order_select" onchange="removeValueFromOtherLists(this)">
                <option value="-1" selected disabled hidden>Параметър 2</option>
                <option value="fn">ФН</option>
                <option value="name">Име</option>
                <option value="degree">Степен</option>
                <option value="major">Специалност</option>
                <option value="group">Група</option>
                <option value="grade">Успех</option>
            </select>
            <select id="diploma_order_3" name="diploma_order_3" class="diploma_order_select" onchange="removeValueFromOtherLists(this)">
                <option value="-1" selected disabled hidden>Параметър 3</option>
                <option value="fn">ФН</option>
                <option value="name">Име</option>
                <option value="degree">Степен</option>
                <option value="major">Специалност</option>
                <option value="group">Група</option>
                <option value="grade">Успех</option>
            </select>
            <select id="diploma_order_4" name="diploma_order_4" class="diploma_order_select" onchange="removeValueFromOtherLists(this)">
                <option value="-1" selected disabled hidden>Параметър 4</option>
                <option value="fn">ФН</option>
                <option value="name">Име</option>
                <option value="degree">Степен</option>
                <option value="major">Специалност</option>
                <option value="group">Група</option>
                <option value="grade">Успех</option>
            </select>
            <select id="diploma_order_5" name="diploma_order_5" class="diploma_order_select" onchange="removeValueFromOtherLists(this)">
                <option value="-1" selected disabled hidden>Параметър 5</option>
                <option value="fn">ФН</option>
                <option value="name">Име</option>
                <option value="degree">Степен</option>
                <option value="major">Специалност</option>
                <option value="group">Група</option>
                <option value="grade">Успех</option>
            </select>
            <select id="diploma_order_6" name="diploma_order_6" class="diploma_order_select" onchange="removeValueFromOtherLists(this)">
                <option value="-1" selected disabled hidden>Параметър 6</option>
                <option value="fn">ФН</option>
                <option value="name">Име</option>
                <option value="degree">Степен</option>
                <option value="major">Специалност</option>
                <option value="group">Група</option>
                <option value="grade">Успех</option>
            </select>
            <button type="submit" id="submit_action" class="submit-action" onclick="submitDiplomaOrder(event)">Запази <i class="far fa-save"></i></button>
            <p class="message-bar" id='message-bar-diploma-order'></p>
        </form>
    </div>
    <script src="moderator_home.js"></script>
</body>

</html>