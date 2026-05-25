<div class="layui-container" style = "margin-top:2em;">
    <div class="layui-row">
        <div class="layui-col-lg12">
            <div>
                <ol>
                    <li>1. 准备旧版导入工具包，将解压后的 <code>import.php</code> 放到站点根目录</li>
                    <li>2. 请将旧版 1.x 的数据库放到 2.x 的 data/temp/ 目录，看起来应该是 data/temp/imgurl.db3</li>
                    <li>3. 将1.x的图片目录upload、temp放到2.x根目录</li>
                    <li>4. 准备完毕后点击下方按钮进行升级</li>
                    <li>5. 升级完毕后删除<code>data/temp/imgurl.db3</code>和<code>import.php</code></li>
                </ol>
            </div>
            <div style = "margin-top:1em;"><a href="/import.php?id=1" class="layui-btn">开始升级</a></div>
        </div>
    </div>
</div>
