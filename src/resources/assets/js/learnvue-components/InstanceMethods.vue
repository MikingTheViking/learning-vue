<template>

    <div>
        <div class="col-sm-12">
            <p>This Vue component demonstrates event handling (click), model binding and data watching. You can: </p>
            <hr />
            <ul>
                <li>Update the displayed time to the current time, manually.</li>
                <li>Toggle an interval to update the time on/off</li>
                <li>Specify the frequency the time should be updated</li>
            </ul>
        </div>
        <div class="col-sm-4 col-sm-offset-1">
            <div class="form-group">
                <button class="btn btn-default" v-on:click="updateTime">Update time manually</button>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <label for="runAutoTimeUpdate"><input type="checkbox" id="runAutoTimeUpdate" value="on" v-model="checkedAutoUpdate"> Automatically update the time every</label>
                    </span>
                    <input type="number" min="1" class="form-control" v-model="autoIncrementMs" />
                    <span class="input-group-addon">
                        ms? {{checkedAutoUpdate == true ? 'Yupp' : 'Nope'}}
                    </span>
                </div><!-- /input-group -->
            </div>
        </div>
        <div class="col-sm-6 col-sm-offset-1">
            <div class="panel">
                <div class="panel-body">
                    <p>The time is: {{time}} </p>
                </div>
            </div>
        </div>
    </div>
    

</template>

<script>

    export default {

        


        data() {            
            let time = new Date();
            let checkedAutoUpdate = false;

            return {

                time: this.formatDate(time),
                checkedAutoUpdate: checkedAutoUpdate,
                autoUpdater: null,
                autoIncrementMs: 1000
            };
        },
        methods: {
            updateTime: function() {
                this.time = this.formatDate(new Date());
            },
            formatDate: function(date) {
                var monthNames = [
                    "January", "February", "March",
                    "April", "May", "June", "July",
                    "August", "September", "October",
                    "November", "December"
                ];

                var day = date.getDate();
                var monthIndex = date.getMonth();
                var year = date.getFullYear();
                var hour = date.getHours();
                var minute = date.getMinutes();
                var seconds = date.getSeconds();
                var milliseconds = date.getMilliseconds();

                return day + ' ' + monthNames[monthIndex] + ' ' + year + " - " + hour + ':' + minute + ':' + seconds + ':' + milliseconds;
            }
        },
        watch: {
            checkedAutoUpdate (val) {
                if (val) {
                    //start up the autoupdater
                    this.autoUpdater = setInterval(this.updateTime, this.autoIncrementMs);
                } else {
                    //turn off the autoupdater
                    clearInterval(this.autoUpdater);
                    this.autoUpdater = null;
                }

            },
            autoIncrementMs (val) {
                if (this.checkedAutoUpdate) {
                    clearInterval(this.autoUpdater);
                    this.autoUpdater = setInterval(this.updateTime, this.autoIncrementMs);
                }
            }
        }
    }

</script>

<style lang="scss">

    .counter {
        
        background: black;
    }

</style>