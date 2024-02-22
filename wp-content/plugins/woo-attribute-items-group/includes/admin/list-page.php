<!-- Existing Groups Table -->
<h2>Existing Groups</h2>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th scope="col">Group Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through existing groups and display them in table rows -->
                <?php foreach ($groups as $group) : ?>
                    <tr>
                        <td><?php echo esc_html($group->name); ?></td>
                        <td><?php echo esc_html($group->description); ?></td>
                        <!-- <td>
                            <a href="#" class="button edit-group">Edit</a>
                            <a href="#" class="button delete-group">Delete</a>
                        </td> -->
                        <td width='25%'>
                            <a href='admin.php?page=woo-attribute-items-group&upt=<?php echo $group->id; ?>'><button type='button'>UPDATE</button></a> 
                            <a href='admin.php?page=woo-attribute-items-group&del=<?php echo $group->id; ?>'><button type='button'>DELETE</button></a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>