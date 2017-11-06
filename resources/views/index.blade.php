@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2 text-center">
        <button id="convert_odds_btn" class="btn btn-primary">Convert Odds</button>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>Odds Conversion Table</h2>
        <table id="odds_conversion_list" class="table table-condensed table-striped table-bordered">
            <tbody> 
                <tr>
                    <th>Fraction</th>
                    <th>Decimal</th>
                    <th>American</th>
                </tr> 
                <tr><td 1/5</td><td>1.20</td><td>-500</td></tr>
                <tr><td>2/9</td><td>1.22</td><td>-450</td></tr> 
                <tr><td>1/4</td><td>1.25</td><td>-400</td></tr>
                <tr><td>2/7</td><td>1.29</td><td>-350</td></tr> 
                <tr><td>3/10</td><td>1.30</td><td>-333.3</td></tr> 
                <tr><td>1/3</td><td>1.33</td><td>-300</td></tr> 
                <tr><td>4/11</td><td>1.36</td><td>-275</td></tr>
                <tr><td>4/9</td><td>1.44</td><td>-225</td></tr>
                <tr><td>1/3</td><td>1.33</td><td>-300</td></tr> 
                <tr><td>5/4</td><td>2.25</td><td>125</td></tr> 
                <tr><td>11/8</td><td>2.38</td><td>137.5</td></tr> 
                <tr><td>9/1</td><td>10.00</td><td>900</td></tr>
                <tr><td>10/1</td><td>11.00</td><td>1000</td></tr> 
                <tr><td>20/1</td><td>21.00</td><td>2000</td></tr> 
                <tr><td>50/1</td><td>51.00</td><td>5000</td></tr> 
                <tr><td>100/1</td><td>101.00</td><td>10000</td></tr> 
                <tr><td>1000/1</td><td>1001.00</td><td>100000</td></tr> 
            </tbody> 
        </table>
        <div id="convert_odds_modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="/img/dice.png" />
                        <button type="button" class="modal-close" data-dismiss="modal"></button>
             
                    </div>
                    <div class="modal-body">
                        <table class="table table-condensed table-striped table-bordered" id="odds-converter"> 
                            <tbody> 
                                <tr> 
                                    <th>Fraction</th> 
                                    <th>Decimal</th> 
                                    <th>American</th> 
                                </tr> 
                                <tr> 
                                    <td><input type="text" id="fraction"></td> 
                                    <td><input type="text" id="decimal"></td> 
                                    <td><input type="text" id="american"></td> 
                                </tr> 
                            </tbody> 
                        </table>
                        <h4 id="errors" class="hidden">An error has occurred</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop