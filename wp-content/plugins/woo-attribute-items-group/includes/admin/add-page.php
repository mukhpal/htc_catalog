<!-- Add New Group Form -->
<h2>Add New Group</h2>
        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="group_name">Group Name</label></th>
                        <td><input type="text" id="group_name" name="group_name" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="group_description">Description</label></th>
                        <td><textarea id="group_description" name="group_description" rows="3"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <?php wp_nonce_field('woo_attribute_items_group_nonce', 'woo_attribute_items_group_nonce'); ?>
            <input type="hidden" name="action" value="add_group">
            <?php submit_button('Add Group', 'primary', 'submit', false); ?>
        </form>