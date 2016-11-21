<spark-current-teams :user="user" :teams="teams" inline-template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">My Teams</div>

            <div class="panel-body">
                <table class="table table-borderless m-b-none">
                    <thead>
                        <th class="col-md-4">Name</th>
                        <th class="col-md-4">Owner</th>
                        <th class="col-md-2"></th>
                        <th class="col-md-2"></th>
                    </thead>

                    <tbody>
                        <tr v-for="team in teams">
                            <!-- Team Name -->
                            <td>
                                <div class="btn-table-align">
                                    @{{ team.name }}
                                </div>
                            </td>

                            <!-- Owner Name -->
                            <td>
                                <div class="btn-table-align">
                                    <span v-if="user.name == team.owner.name">
                                        You
                                    </span>

                                    <span v-else>
                                        @{{ team.owner.name }}
                                    </span>
                                </div>
                            </td>

                            <!-- Edit Button -->
                            <td>
                                <a href="/settings/teams/@{{ team.id }}">
                                    <button class="btn btn-default">
                                        <i class="fa fa-cog"></i> Settings
                                    </button>
                                </a>
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <button class="btn btn-warning" @click="approveLeavingTeam(team)"
                                    data-toggle="tooltip" title="Leave Team"
                                    v-if="user.id !== team.owner_id">
                                    <i class="fa fa-sign-out"></i>&nbsp;Leave Team
                                </button>
                                <button class="btn btn-danger-outline" @click="approveTeamDelete(team)" v-if="user.id === team.owner_id">
                                    <i class="fa fa-times"></i>&nbsp;Delete Team
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Leave Team Modal -->
        <div class="modal fade" id="modal-leave-team" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="leavingTeam">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Leave Team (@{{ leavingTeam.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to leave this team?
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>

                        <button type="button" class="btn btn-warning" @click="leaveTeam" :disabled="leaveTeamForm.busy">
                            Yes, Leave
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Team Modal -->
        <div class="modal fade" id="modal-delete-team" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="deletingTeam">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            Delete Team (@{{ deletingTeam.name }})
                        </h4>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to delete this team? If you choose to delete the team, all of the
                        team's data will be permanently deleted.
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>

                        <button type="button" class="btn btn-danger" @click="deleteTeam" :disabled="deleteTeamForm.busy">
                            <span v-if="deleteTeamForm.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Deleting
                            </span>

                            <span v-else>
                                Yes, Delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-current-teams>
