<?= $this->session->flashdata('message'); ?>
<table class="table table-bordered">
    <tr>
        <th> I AM ALREADY REGISTERED </th>
    </tr>
    <tr>
        <td>
            <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                <div class="control-group">
                    <label class="control-label" for="inputUsername">Email</label>
                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword1">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
                    </div>
                </div>
            </form>
        </td>
    </tr>
</table>