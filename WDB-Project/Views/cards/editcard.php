<body>
<head>
    <title>Card</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/card.css">
</head>
<main>
    <section>
        <form action="" method="POST">
            <table id="cardTable">
                <tr>
                    <th id="regHeader" colspan="2">Registration</th>
                </tr>
                <tr>
                    <td colspan="2">Short name, at which you will recognize the card</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="cardName" class="fullTags"/></td>
                </tr>
                <tr>
                    <td class="tabledata" colspan="1">Card number:</td>
                    <td colspan="1">Code validation:</td>
                </tr>
                <tr>
                    <td colspan="1"><input type="text" name="cardNumber" class="inputTags"/></td>
                    <td colspan="1"><input type="text" name="codeValidation" class="inputTags"/></td>
                </tr>
                <tr>
                    <td colspan="2">Expiration Date(MM/YY)</td>
                </tr>
                <tr>
                    <td colspan="1">
                        <select name="month" id="month">
                            <option value disabled selected>Month (MM)</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select col>
                    </td>
                    <td colspan="1">
                        <select name="year" id="year">
                            <option value disabled selected>Year (YY)</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Name of cardholder as it appears on the map:</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="cardholder" class="fullTags"></td>
                </tr>
                <tr>
                    <td colspan="2">Name of the bank issuing the card:</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="bankname" class="fullTags"></td>
                </tr>
                <tr>
                    <th colspan="1" id="billingAddress">Billing address</th>
                </tr>
                <tr>
                    <td colspan="1">Country:</td>
                    <td colspan="1">Postcode:</td>
                </tr>
                <tr>
                    <td><input type="text" colspan="1" name="country"></td>
                    <td><input type="text" colspan="1" name="postcode"></td>
                </tr>
                <tr>
                    <td colspan="2">Location:</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" class="fullTags" name="location"></td>
                </tr>
                <tr>
                    <td colspan="2">Address:</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" class="fullTags" name="address"></td>
                </tr>
                <tr>
                    <td>Initial cash:</td>
                </tr>
                <tr>
                    <td><input type="text" name="initialCash"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="CardCancel" value="Cancel"></td>
                    <td><input type="submit" name="CardOk" value="OK"></td>
                </tr>
            </table>
        </form>
    </section>
</main>
</body>