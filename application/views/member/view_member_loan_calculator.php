<div id="page-wrapper">
    <div class="col-md-12 graphs">
        <form name=first>
            <table>
                <tr>
                    <td> Loan Amount:</td>
                    <td><input name=aa type=text onkeyup=checnum(this) ></td>
                </tr>
                <tr>
                    <td>Interest Rates:</td>
                    <td><input name=bb type=text onkeyup=checnum(this) ></td>
                </tr>
                <tr>
                    <td>Term(Years):</td>
                    <td><input name=cc type=text onkeyup=checnum(this)></td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type=button name=ss value=calculate onclick=loan() ></td>
                </tr>
                <tr>
                    <td>Monthly Payment(EMI):</td>
                    <td><input name=r1 type=text readonly ></td>
                </tr>
                <tr>
                    <td>Monthly Average Interest:</td>
                    <td><input name=r2 type=text readonly ></td>
                </tr>
                <tr>
                    <td> Monthly Interest:</td>
                    <td><input name=r3 type=text readonly ></td>
                </tr>
            </table>

        </form>

        <script type="text/javascript">
            function checnum(as)
            {
                var dd = as.value;
                if (isNaN(dd))
                {
                    dd = dd.substring(0, (dd.length - 1));
                    as.value = dd;
                }
            }
            function loan() {
                var a = document.first.aa.value;
                var b = document.first.bb.value;
                var c = document.first.cc.value;
                var n = c * 12;
                var r = b / (12 * 100);
                var p = (a * r * Math.pow((1 + r), n)) / (Math.pow((1 + r), n) - 1);
                var prin = Math.round(p * 100) / 100;
                document.first.r1.value = prin;
                var mon = Math.round(((n * prin) - a) * 100) / 100;
                document.first.r2.value = mon;
                var tot = Math.round((mon / n) * 100) / 100;
                document.first.r3.value = tot;
                for (var i = 0; i < n; i++)
                {
                    var z = a * r * 1;
                    var q = Math.round(z * 100) / 100;
                    var t = p - z;
                    var w = Math.round(t * 100) / 100;
                    var e = a - t;
                    var l = Math.round(e * 100) / 100;
                    a = e;
                }
            }</script>
    </div>
</div>