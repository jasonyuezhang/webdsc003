<div id="ws_menu_access_editor" title="Permissions">

    <div class="ws_dialog_panel">
        <div class="ws_hint" id="ws_hint_menu_permissions">
            <div class="ws_hint_close" title="Close">x</div>
            <div class="ws_hint_content">
                <strong>Hint:</strong> Individual submenus can override these settings.
                As a result, this menu will stay visible as long as at least one of its
                submenus is accessible.
            </div>
        </div>

        <div class="error inline" id="ws_hardcoded_role_error">
            <p>
                <strong>Note:</strong>
                Only users with the "<span id="ws_hardcoded_role_name">[role]</span>" role
                can access this menu. This restriction is hard&shy;coded in the plugin that
                created the menu.
            </p>
        </div>

        <div id="ws_role_access_container" class="ws_dialog_subpanel">
            <strong>Grant access</strong>
            <a class="ws_tooltip_trigger" title="
				Check a box to give that role or user the required capability and access to this menu.
				Clear the box to prevent access.
			">[?]</a>
            <br>

            <div id="ws_role_table_body_container">
                <div id="ws_role_access_overlay" class="ws_hide_if_pro"></div>
                <div id="ws_role_access_overlay_content" class="ws_hide_if_pro">
                    Pro only feature.
                    Use capabilities (below) instead.
                </div>

                <table class="widefat fixed ws_role_table_body">
                    <tbody>
                    <!-- Table contents will be generated by JavaScript. -->
                    </tbody>
                </table>
            </div>
        </div>


        <div id="ws_required_cap_container" class="ws_dialog_subpanel">
            <strong>Required capability</strong>
            <a class="ws_tooltip_trigger" title="
				This capability check is hard-coded in WordPress or the plugin that created the menu.

				&lt;ul class=&quot;ws_tooltip_content_list&quot;&gt;
					&lt;li&gt;
						Only roles with the this capability will be able to access this menu.
					&lt;li&gt;
						Admin Menu Editor will automatically grant the required capability to
						all roles you check in the &quot;Roles&quot; list.
					&lt;li&gt;
						Custom menus have no hard-coded capability requirements.
				&lt;/ul&gt;
			">[?]</a>
            <br>
            <span id="ws_required_capability">capability_here</span>
        </div>

        <div id="ws_extra_cap_container" class="ws_dialog_subpanel">
            <label for="ws_extra_capability">
                <strong>Extra capability</strong>
            </label>
            <a class="ws_tooltip_trigger" title="
				Optional. An additional capability check that will be applied on top of
				the &quot;Roles&quot; and &quot;Required capability&quot; settings.
				Leave empty to disable.
			">[?]</a>
            <br>
            <input type="text" id="ws_extra_capability" class="ws_has_dropdown" value=""><input type="button"
                                                                                                id="ws_trigger_capability_dropdown"
                                                                                                value="&#9660;"
                                                                                                class="button ws_dropdown_button"
                                                                                                tabindex="-1">
        </div>
    </div>

    <div class="ws_dialog_buttons">
        <input type="button" class="button-primary" value="Save Changes" id="ws_save_access_settings">
        <input type="button" class="button ws_close_dialog" value="Cancel">
    </div>

</div>