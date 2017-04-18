<?php
        /**

         * Debug a variable with stop app

         */

        function dd() {
                if (!YII_DEBUG) return;
                array_map(function ($x){
                        echo \yii\helpers\VarDumper::dump($x, 10, true);
                }, func_get_args());

                Yii::$app->end();
        }

        /**

         * Debug a variable without stop app

         */

        function d() {
                if (!YII_DEBUG) return;
                array_map(function ($x){
                        echo \yii\helpers\VarDumper::dump($x, 10, true);
                }, func_get_args());
        }