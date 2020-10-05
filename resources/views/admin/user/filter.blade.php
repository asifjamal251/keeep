<div class="col-md-12">
    <button data-toggle="collapse"  class="btn btn-default btn-xs pull-right" data-target="#filterFormSection">Filter</button>
    <div id="filterFormSection" class="collapse"  style="width: 95%">
        <form action="javascript:;" id="filterForm">
            @csrf
            @method('PATCH')
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <tr>
                    <td> ID From</td>
                    <td><input autocomplete="off" type="text" name="idFrom" style=" width:100px;"/></td>
                    <td>ID To</td>
                    <td><input autocomplete="off" type="text"  name="idTo" style=" width:100px;"/></td>
                    <td> Date From</td>
                    <td><input autocomplete="off" type="date" name="dateFrom" style=" width:100px;"/></td>
                    <td>Date To</td>
                    <td><input autocomplete="off" type="date"  name="dateTo" style=" width:150px;"/></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input autocomplete="off" type="text" name="mobile" style=" width:100px;"/></td>
                    <td>Name</td>
                    <td><input autocomplete="off" type="text" name="name" style=" width:100px;"/></td>
                    <td>Refer Id</td>
                    <td><input autocomplete="off" type="text" name="referid" style=" width:100px;"/></td>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option value="0">Both</option>
                            <option value="1">Active</option>
                            <option value="2">Deactive</option>
                        </select>
                        {{-- <input type="button" name="search" id="searchBtn" value="Search" class="pull-right btn btn-success btn-sm"/> --}}
                    </td>

                   
                </tr>
                <tr> 
                    <td>Block Kyc</td>
                    <td>
                        <select name="kycStatus">
                            <option value="all">All</option>
                            <option value="kyc">No Kyc</option>
                            <option value="bank">No Bank Detail</option>
                        </select>
                       
                    </td>

                    <td>Block Income Status </td>
                    <td>
                        <select name="incomeStatus">
                            <option value="all">All</option>
                            <option value="booster">Block Booster Income</option>
                            <option value="binary">Block Binary Income</option>
                            <option value="direct">Block Direct Income</option>
                            <option value="cashback">Block Cashback Income</option>
                        </select>
                        
                    </td>
                    <td colspan="4"><input type="button" name="search" id="searchBtn" value="Search" class="pull-right btn btn-success btn-sm"/></td>

                </tr>
                
            </table>
            <br><br>
        </form>
    </div>
</div>