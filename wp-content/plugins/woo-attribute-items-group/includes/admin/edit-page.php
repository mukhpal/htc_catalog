<!-- Edit Group Form -->
<h2>Update Group</h2>
        <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="group_name">Group Name</label></th>
                        <td>
                            <input type='hidden' id='uptid' name='uptid' value="<?php echo $upt_id; ?>">
                            <input type="text" id="group_name" name="group_name" value="<?php echo $name; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="group_description">Description</label></th>
                        <td><textarea id="group_description" name="group_description" rows="3"><?php echo $description; ?></textarea></td>
                    </tr>
                </tbody>
            </table>
            <?php wp_nonce_field('woo_attribute_items_group_nonce', 'woo_attribute_items_group_nonce'); ?>
            <input type="hidden" name="uptsubmit" value="add_group">
            <?php submit_button('Update', 'primary', 'uptsubmit', false); ?>
            <a href="#" class="button reset-group">Reset</a>
        </form>