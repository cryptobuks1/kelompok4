<div class="container-fluid">
    <h4>Keranjangn Belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>

        <?php
        $no=0;
        foreach ($this->cart->contents)() as $items) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $items['name'] ?></td>
                <td><?php echo $items['qty'] ?></td>
                <td><?php echo $items['price'] ?></td>
                <td><?php echo $items['subtotal'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>