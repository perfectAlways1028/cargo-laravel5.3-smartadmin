<html>
    <head>
        <title>Factuur</title>
        <style>
            html > * {
                font-family:'Helvetica Neue','Open sans',Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td><img src="{{ url('images/logo.png') }}" /></td>
                        </tr>
                        <tr>
                            <td><h1>Factuur</h1></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td style="text-align:center;">
                                <b>Roopcom Cargo Service & More</b><br/>
                                Kernkampweg 48<br/>
                                Paramaribo, Suriname <br/>
                                tel: +597-431 114 <br/>
                                mob: +597-888 87 53 <br/>
                                www.roopcom.com <br/>
                                cargo@roopcom.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="font-weight:bold;padding-right:50px;">Debiteur</td>
                            <td style="text-align:right;">{{$tx->customer->first_name}} {{$tx->customer->last_name}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;padding-right:50px;">Factuurnummer</td>
                            <td style="text-align:right;">{{$tx->invoice_number}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;padding-right:50px;">Aantal Delen</td>
                            <td style="text-align:right;">1</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;padding-right:50px;">Datum</td>
                            <td style="text-align:right;">{{ date('d M Y',strtotime($tx->created_at))}}</td>
                        </tr>
                    </table>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table style="width:100%; border:1px solid #444;">
                        <tr style="background:#c00; color:#fff; text-align:left;">
                            <td>Product</td>
                        </tr>
                             <tr>
                                <td>{{$tx->product->title}}</td>
                            </tr>
                     
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;"><b>commentaar:</b> ({{$tx->comment}})</td>

            </tr>
            <tr>

                <td><b>Handtekening:</b><br/><img src='{{$tx->signature}}' width="300px"/></td>
                <td>
                    <table>

                        <tr>
                            <td style="font-weight:bold;padding-right:50px;">Totaal</td>
                            <td style="text-align:right;">{{$tx->total}} USD</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;padding-right:50px;">Betaald</td>
                            <td style="text-align:right;">{{$tx->paid}} USD</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;padding-right:50px;">Wisselgeld</td>
                            <td style="text-align:right;">{{$tx->change*-1}} USD</td>
                        </tr>
      
                    </table>
                </td>
            </tr>
        </table>

                <div style="color:#888;font-style:italic; border:1px solid #aaa; margin-top:10px; font-size:10px; position:absolute; bottom:0; width:100%; text-align:left;" colspan="2">
                    Op al onze leveringen en diensten zijn de volgende verkoop-, leverings- en betalingsvoorwaarden van toepassing. 
                    <br/>Controleer uw pakketen voordat u deze ontvangt. Nadat u onze gebouw heeft verlaten zijn wij niet meer verantwoordelijk voor reclamaties.
                    <br/>Wij zijn niet aansprakelijk voor beschadigde producten of ontbrekende producten van boven genoemde trackingcodes. Over het gewicht van pakketten kan er niet gecorrespondeerd worden. Dez worden op de luchthaven gewogen.
                </div>
    </body>
</html>