@extends('layouts.admin')
@section('content')
    <div class="layui-body">
        <div class="layui-tab layui-tab-brief layui-row">
            <ul class="layui-tab-title layui-col-md5">
                <a href="/admin/data/sensorStatic/form">静态数据管理
                    <li class="layui-this">
                        静态数据管理
                    </li>
                </a>
            </ul>
            <span class="layui-breadcrumb layui-col-md7 txt-right tab-nav" style="visibility: visible;">
      <a href="/">首页</a><span lay-separator="">/</span>
      <a id="J-tab-nav-cur"><cite>静态数据管理</cite></a>
    </span>
        </div>
        <script type="application/javascript">
            $(document).ready(function () {
                var thisItem = $("#J-left-nav dd.layui-this").parent().prev();
                if (typeof(thisItem) != "undefined" && thisItem.size() > 0)
                {
                    var thisTxt = thisItem.text();
                    $("#J-tab-nav-cur").before('<a >'+thisTxt+'</a><span lay-separator="">/</span>');
                }
                $(".layui-tab-brief .layui-tab-title li").each(function(index, item){
                    if($(item).hasClass("layui-this")){
                        if(index != 0){
                            $("#J-tab-nav-cur").before('<a >'+$(".layui-tab-brief .layui-tab-title li:first").text()+'</a><span lay-separator="">/</span>');
                            return;
                        }
                    }
                });
            });

        </script>
        <form action="" class="layui-form" method="post">
            <div class="layui-col-md5  mt-15" style="margin-right: 30px;">
                <div class="layui-form-item">
                    <label class="layui-form-label">所属项目</label>
                    <div class="layui-input-block">
                        <select name="projectId" id="projectId" lay-filter="projectId" lay-verify="required" lay-vertype="tips" lay-search="">
                            <option value="">请选择项目</option>
                            <option value="163">长沙市固体废弃物处理场已封场堆体边坡</option>
                            <option value="169">长沙县检察院基坑</option>
                            <option value="121">洞新高速绥宁连接线</option>
                            <option value="124">福建漳永高速公路（华安至新圩段）</option>
                            <option value="10">甘肃双达公路</option>
                            <option value="94">甘肃渭武高速三标</option>
                            <option value="55">甘肃渭武高速十标</option>
                            <option value="106">甘肃渭武高速一标</option>
                            <option value="109">甘肃渭武高速七标</option>
                            <option value="4">广东汕湛高速</option>
                            <option value="175">广西交通厅项目</option>
                            <option value="25">广西乐百高速</option>
                            <option value="76">广西柳南高速</option>
                            <option value="172">贵州贵黄高速</option>
                            <option value="64">(已禁用)贵州监控中心</option>
                            <option value="103">贵州三荔高速</option>
                            <option value="40">贵州六威高速</option>
                            <option value="46">(已禁用)海南监控中心</option>
                            <option value="61">联智工业园</option>
                            <option value="91">湖南龙永高速红岩溪</option>
                            <option value="16">湖南石榴湾小区</option>
                            <option value="37">湖南龙永高速</option>
                            <option value="52">湖南宁道高速</option>
                            <option value="160">湖南省新山冲尾矿库</option>
                            <option value="145">湖南省炎汝高速</option>
                            <option value="148">(已禁用)湖南省炎汝高速</option>
                            <option value="58">湖南益马高速</option>
                            <option value="97">湖南张花高速连接线1标</option>
                            <option value="31">湖南张花高速连接线2标</option>
                            <option value="28">湖南溆怀高速</option>
                            <option value="178">湖南怀通高速</option>
                            <option value="115">嘉鱼大桥索塔变形监测</option>
                            <option value="88">江苏桥梁监控</option>
                            <option value="184">荒塘亭大桥桥梁监测</option>
                            <option value="67">银川黄河大桥</option>
                            <option value="190">深圳市南海大道暗挖隧道</option>
                            <option value="22">中石化西南局</option>
                            <option value="181">万家丽路应急监测</option>
                            <option value="136">望城北斗+公共安全综合监测预警服务</option>
                            <option value="187">渭武高速定西项目办</option>
                            <option value="133">湖南省武靖高速</option>
                            <option value="157">新溆高速白莲冲大桥自动化在线监测</option>
                            <option value="166">益南七标K44+725～K45+120右侧路堑边坡</option>
                            <option value="154">渝黔高速公路扩能工程</option>
                            <option value="139">重庆龙洲湾隧道项目</option>
                            <option value="112">重遵扩容工程</option>
                        </select><div class="layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择项目" value="" class="layui-input"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择项目</dd><dd lay-value="163" class="">长沙市固体废弃物处理场已封场堆体边坡</dd><dd lay-value="169" class="">长沙县检察院基坑</dd><dd lay-value="121" class="">洞新高速绥宁连接线</dd><dd lay-value="124" class="">福建漳永高速公路（华安至新圩段）</dd><dd lay-value="10" class="">甘肃双达公路</dd><dd lay-value="94" class="">甘肃渭武高速三标</dd><dd lay-value="55" class="">甘肃渭武高速十标</dd><dd lay-value="106" class="">甘肃渭武高速一标</dd><dd lay-value="109" class="">甘肃渭武高速七标</dd><dd lay-value="4" class="">广东汕湛高速</dd><dd lay-value="175" class="">广西交通厅项目</dd><dd lay-value="25" class="">广西乐百高速</dd><dd lay-value="76" class="">广西柳南高速</dd><dd lay-value="172" class="">贵州贵黄高速</dd><dd lay-value="64" class="">(已禁用)贵州监控中心</dd><dd lay-value="103" class="">贵州三荔高速</dd><dd lay-value="40" class="">贵州六威高速</dd><dd lay-value="46" class="">(已禁用)海南监控中心</dd><dd lay-value="61" class="">联智工业园</dd><dd lay-value="91" class="">湖南龙永高速红岩溪</dd><dd lay-value="16" class="">湖南石榴湾小区</dd><dd lay-value="37" class="">湖南龙永高速</dd><dd lay-value="52" class="">湖南宁道高速</dd><dd lay-value="160" class="">湖南省新山冲尾矿库</dd><dd lay-value="145" class="">湖南省炎汝高速</dd><dd lay-value="148" class="">(已禁用)湖南省炎汝高速</dd><dd lay-value="58" class="">湖南益马高速</dd><dd lay-value="97" class="">湖南张花高速连接线1标</dd><dd lay-value="31" class="">湖南张花高速连接线2标</dd><dd lay-value="28" class="">湖南溆怀高速</dd><dd lay-value="178" class="">湖南怀通高速</dd><dd lay-value="115" class="">嘉鱼大桥索塔变形监测</dd><dd lay-value="88" class="">江苏桥梁监控</dd><dd lay-value="184" class="">荒塘亭大桥桥梁监测</dd><dd lay-value="67" class="">银川黄河大桥</dd><dd lay-value="190" class="">深圳市南海大道暗挖隧道</dd><dd lay-value="22" class="">中石化西南局</dd><dd lay-value="181" class="">万家丽路应急监测</dd><dd lay-value="136" class="">望城北斗+公共安全综合监测预警服务</dd><dd lay-value="187" class="">渭武高速定西项目办</dd><dd lay-value="133" class="">湖南省武靖高速</dd><dd lay-value="157" class="">新溆高速白莲冲大桥自动化在线监测</dd><dd lay-value="166" class="">益南七标K44+725～K45+120右侧路堑边坡</dd><dd lay-value="154" class="">渝黔高速公路扩能工程</dd><dd lay-value="139" class="">重庆龙洲湾隧道项目</dd><dd lay-value="112" class="">重遵扩容工程</dd></dl></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">所属结构物</label>
                    <div class="layui-input-block layui-form" lay-filter="structureIdBox">
                        <select name="structureId" id="structureId" lay-filter="structureId" lay-verify="required" lay-vertype="tips" lay-search="">
                            <option value="">请选择结构物</option>
                        </select><div class="layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择结构物" value="" class="layui-input"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择结构物</dd></dl></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">传感器类型</label>
                    <div class="layui-input-block" lay-filter="sensorTypeIdBox">
                        <select name="sensorTypeId" id="sensorTypeId" lay-filter="sensorTypeId" lay-verify="required" lay-vertype="tips" lay-search="">
                            <option value="">请选择传感器类型</option>
                        </select><div class="layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择传感器类型" value="" class="layui-input"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择传感器类型</dd></dl></div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">传感器</label>
                    <div class="layui-input-block">
                        <select name="sensorId" id="sensorId" lay-filter="reportType" lay-verify="required" lay-vertype="tips" lay-search="">
                            <option value="">请选择传感器</option>
                        </select><div class="layui-form-select"><div class="layui-select-title"><input type="text" placeholder="请选择传感器" value="" class="layui-input"><i class="layui-edge"></i></div><dl class="layui-anim layui-anim-upbit"><dd lay-value="" class="layui-select-tips">请选择传感器</dd></dl></div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item layui-form" lay-filter="reference" id="J-reference-list">
            </div>
            <div class="buttons" style="">
                <button class="layui-btn" lay-submit="" lay-filter="submit">提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">恢复</button>
            </div>
        </form>
    </div>
@endsection
