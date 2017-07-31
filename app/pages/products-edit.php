<div class="container">

    <div class="row">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amout</th>
                <th>Price</th>
                <th>Img</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <!-- more... -->
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <!-- TODO : Action war leer -->
        <form action="?p=products-edit&action=insert" method="post" role="form">
            <legend>Proucts Edit</legend>

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id=""
                       placeholder="Input...">
            </div>

            <div class="form-group">
                <label for="">Amount</label>
                <input type="number" class="form-control" name="amount" id=""
                       placeholder="Input...">
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" id=""
                       placeholder="Input...">
            </div>

            <div class="form-group">
                <label for="">IMG</label>
                <input type="file" class="form-control" name="img" id=""
                       placeholder="Input...">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id=""
                          placeholder="Input..."></textarea>
            </div>



            <input type="submit" name='submit' value="speichern" class="btn btn-primary">
        </form>
    </div>

</div>