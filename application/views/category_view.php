<div>
        <?php echo form_open('product_controller/category_pdf'); ?>
        <table>
            <tr>
        <?php
        $tmpl = array (
                    'table_open'          => '<table border="1" cellpadding="1" cellspacing="1">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

                $this->table->set_template($tmpl);
                echo $this->table->generate($query);
        ?>
        </tr>
            <tr><input type="submit" align="center" name="submit" id="submit" value="Save As PDF"/></tr>
        </table>
<?php echo form_close(); ?>
</div>