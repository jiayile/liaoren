<?php
/**
 * This was contained in an addon until version 1.0.0 when it was rolled into
 * core.
 *
 * @package    WBOLT
 * @author     WBOLT
 * @since      1.1.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2019, WBOLT
 */

$pd_title = 'HTML代码优化工具';
$pd_version = CLEAR_HTML_TAGS_VERSION;
$pd_code = 'cht-setting';
$pd_index_url = 'https://www.wbolt.com/plugins/cht';
$pd_doc_url = 'https://www.wbolt.com/cht-plugin-documentation.html';

?>

<div style=" display:none;">
    <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <symbol id="sico-upload" viewBox="0 0 16 13">
                <path d="M9 8v3H7V8H4l4-4 4 4H9zm4-2.9V5a5 5 0 0 0-5-5 4.9 4.9 0 0 0-4.9 4.3A4.4 4.4 0 0 0 0 8.5C0 11 2 13 4.5 13H12a4 4 0 0 0 1-7.9z" fill="#666" fill-rule="evenodd"/>
            </symbol>
            <symbol id="sico-download" viewBox="0 0 16 16">
                <path d="M9 9V0H7v9H4l4 4 4-4z"/><path d="M15 16H1a1 1 0 0 1-1-1.1l1-8c0-.5.5-.9 1-.9h3v2H2.9L2 14H14L13 8H11V6h3c.5 0 1 .4 1 .9l1 8a1 1 0 0 1-1 1.1"/>
            </symbol>
            <symbol id="sico-wb-logo" viewBox="0 0 18 18">
                <title>sico-wb-logo</title>
                <path d="M7.264 10.8l-2.764-0.964c-0.101-0.036-0.172-0.131-0.172-0.243 0-0.053 0.016-0.103 0.044-0.144l-0.001 0.001 6.686-8.55c0.129-0.129 0-0.321-0.129-0.386-0.631-0.163-1.355-0.256-2.102-0.256-2.451 0-4.666 1.009-6.254 2.633l-0.002 0.002c-0.791 0.774-1.439 1.691-1.905 2.708l-0.023 0.057c-0.407 0.95-0.644 2.056-0.644 3.217 0 0.044 0 0.089 0.001 0.133l-0-0.007c0 1.221 0.257 2.314 0.643 3.407 0.872 1.906 2.324 3.42 4.128 4.348l0.051 0.024c0.129 0.064 0.257 0 0.321-0.129l2.25-5.593c0.064-0.129 0-0.257-0.129-0.321z"></path>
                <path d="M16.714 5.914c-0.841-1.851-2.249-3.322-4.001-4.22l-0.049-0.023c-0.040-0.027-0.090-0.043-0.143-0.043-0.112 0-0.206 0.071-0.242 0.17l-0.001 0.002-2.507 5.914c0 0.129 0 0.257 0.129 0.321l2.571 1.286c0.129 0.064 0.129 0.257 0 0.386l-5.979 7.264c-0.129 0.129 0 0.321 0.129 0.386 0.618 0.15 1.327 0.236 2.056 0.236 2.418 0 4.615-0.947 6.24-2.49l-0.004 0.004c0.771-0.771 1.414-1.671 1.929-2.7 0.45-1.029 0.643-2.121 0.643-3.279s-0.193-2.314-0.643-3.279z"></path>
            </symbol>
            <symbol id="sico-more" viewBox="0 0 16 16">
                <path d="M6 0H1C.4 0 0 .4 0 1v5c0 .6.4 1 1 1h5c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1M15 0h-5c-.6 0-1 .4-1 1v5c0 .6.4 1 1 1h5c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1M6 9H1c-.6 0-1 .4-1 1v5c0 .6.4 1 1 1h5c.6 0 1-.4 1-1v-5c0-.6-.4-1-1-1M15 9h-5c-.6 0-1 .4-1 1v5c0 .6.4 1 1 1h5c.6 0 1-.4 1-1v-5c0-.6-.4-1-1-1"/>
            </symbol>
            <symbol id="sico-plugins" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M16 3h-2V0h-2v3H8V0H6v3H4v2h1v2a5 5 0 0 0 4 4.9V14H2v-4H0v5c0 .6.4 1 1 1h9c.6 0 1-.4 1-1v-3.1A5 5 0 0 0 15 7V5h1V3z"/>
            </symbol>
            <symbol id="sico-doc" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 0H1C.4 0 0 .4 0 1v14c0 .6.4 1 1 1h14c.6 0 1-.4 1-1V1c0-.6-.4-1-1-1zm-1 2v9h-3c-.6 0-1 .4-1 1v1H6v-1c0-.6-.4-1-1-1H2V2h12z"/><path d="M4 4h8v2H4zM4 7h8v2H4z"/>
            </symbol>
            
            <symbol id="wbsico-donate" viewBox="0 0 9 18">
                <path fill-rule="evenodd" d="M5.63 8.1V4.61c.67.23 1.12.9 1.12 1.58S7.2 7.3 7.88 7.3 9 6.86 9 6.2a3.8 3.8 0 0 0-3.38-3.83V1.12C5.63.45 5.17 0 4.5 0S3.37.45 3.37 1.12v1.24A3.8 3.8 0 0 0 0 6.2C0 8.55 1.8 9.45 3.38 9.9v3.49c-.68-.23-1.13-.9-1.13-1.58S1.8 10.7 1.12 10.7 0 11.14 0 11.8a3.8 3.8 0 0 0 3.38 3.83v1.24c0 .67.45 1.12 1.12 1.12s1.13-.45 1.13-1.12v-1.24A3.88 3.88 0 0 0 9 11.8c0-2.36-1.8-3.26-3.38-3.7zM2.25 6.19c0-.79.45-1.35 1.13-1.58v2.93c-.8-.34-1.13-.68-1.13-1.35zm3.38 7.2v-2.93c.78.34 1.12.68 1.12 1.35 0 .79-.45 1.35-1.13 1.58z"></path>
            </symbol>
            <symbol id="wbsico-like" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M13.3 6H9V2c0-1.5-.8-2-2-2-.3 0-.6.2-.6.5L4 8v8h8.6c1.3 0 2.4-1 2.6-2.3l.8-4.6c.1-.8-.1-1.6-.6-2.1-.5-.7-1.3-1-2.1-1M0 8h2v8H0z"/>
            </symbol>
            <symbol id="wbsico-share" viewBox="0 0 14 16">
                <path fill-rule="evenodd" d="M11 6a3 3 0 1 0-3-2.4L5 5.6A3 3 0 0 0 3 5a3 3 0 0 0 0 6 3 3 0 0 0 1.9-.7l3.2 2-.1.7a3 3 0 1 0 3-3 3 3 0 0 0-1.9.7L6 8.7a3 3 0 0 0 0-1.3l3.2-2A3 3 0 0 0 11 6"/>
            </symbol>
            <symbol id="wbsico-time" viewBox="0 0 18 18">
                <path d="M9 15.75c-3.71 0-6.75-3.04-6.75-6.75S5.29 2.25 9 2.25 15.75 5.29 15.75 9 12.71 15.75 9 15.75zM9 0C4.05 0 0 4.05 0 9s4.05 9 9 9 9-4.05 9-9-4.05-9-9-9z"/>
                <path d="M10.24 4.5h-1.8V9h4.5V7.2h-2.7z"/>
            </symbol>
            <symbol id="wbsico-views" viewBox="0 0 26 18">
                <path d="M13.1 0C7.15.02 2.08 3.7.02 8.9L0 9a14.1 14.1 0 0 0 13.09 9c5.93-.02 11-3.7 13.06-8.9l.03-.1A14.1 14.1 0 0 0 13.1 0zm0 15a6 6 0 0 1-5.97-6v-.03c0-3.3 2.67-5.97 5.96-5.98a6 6 0 0 1 5.96 6v.04c0 3.3-2.67 5.97-5.96 5.98zm0-9.6a3.6 3.6 0 1 0 0 7.2 3.6 3.6 0 0 0 0-7.2h-.01z"/>
            </symbol>
            <symbol id="wbsico-comment" viewBox="0 0 18 18">
                <path d="M9 0C4.05 0 0 3.49 0 7.88s4.05 7.87 9 7.87c.45 0 .9 0 1.24-.11L15.75 18v-4.95A7.32 7.32 0 0 0 18 7.88C18 3.48 13.95 0 9 0z"/>
            </symbol>
            <symbol id="wbsico-poster" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14 0a2 2 0 012 2v12a2 2 0 01-2 2H2a2 2 0 01-2-2V2C0 .9.9 0 2 0h12zm0 2H2v12h12V2zm-6 9a1 1 0 110 2 1 1 0 010-2zm5-8v7H3V3h10z"/>
            </symbol>
        </defs>
    </svg>
</div>

<div id="optionsframework-wrap" class="wbs-wrap wbps-wrap v-wp" data-wba-source="<?php echo $pd_code; ?>" v-cloak>
    <div class="wbs-header">
        <svg class="wb-icon sico-wb-logo"><use xlink:href="#sico-wb-logo"></use></svg>
        <span>WBOLT</span>
        <strong><?php echo $pd_title; ?></strong>

        <div class="links">
            <a class="wb-btn" href="<?php echo $pd_index_url; ?>" data-wba-campaign="title-bar" target="_blank">
                <svg class="wb-icon sico-plugins"><use xlink:href="#sico-plugins"></use></svg>
                <span>插件主页</span>
            </a>
            <a class="wb-btn" href="<?php echo $pd_doc_url; ?>" data-wba-campaign="title-bar" target="_blank">
                <svg class="wb-icon sico-doc"><use xlink:href="#sico-doc"></use></svg>
                <span>说明文档</span>
            </a>
        </div>
    </div>

    <div class="wbs-main">
        <div class="wbs-content option-form" id="optionsframework">

            <div class="sc-header">
                <h3><strong>设定默认删除标签</strong></h3>
            </div>
            <div class="sc-body ">
                <table class="wbs-form-table">
                    <tbody>
                    <tr>
                        <th class="row w8em">常见标签</th>
                        <td>
                            <wb-selector-bar :cnf="cnf.tags.normal" :opt="opt_tags.normal" :format=true @change="opt_tags.normal = $event"></wb-selector-bar>
                        </td>
                    </tr>
                    <tr>
                        <th class="row w8em">表格标签</th>
                        <td>
                            <wb-selector-bar :cnf="cnf.tags.table" :opt="opt_tags.table" :format=true @change="opt_tags.table = $event"></wb-selector-bar>
                        </td>
                    </tr>
                    <tr>
                        <th class="row w8em">列表标签</th>
                        <td>
                            <wb-selector-bar :cnf="cnf.tags.list" :opt="opt_tags.list" :format=true @change="opt_tags.list = $event"></wb-selector-bar>
                        </td>
                    </tr>
                    <tr>
                        <th class="row w8em">其他标签</th>
                        <td>
                            <wb-selector-bar :cnf="cnf.tags.other" :opt="opt_tags.other" :format=true @change="opt_tags.other = $event"></wb-selector-bar>
                        </td>
                    </tr>
                    <tr>
                        <th class="row w8em">自定义</th>
                        <td>
                            <wb-tags-module v-bind:tags="opt.custom.tags" v-bind:all="allTags" v-bind:format=true v-bind:rule="'^[a-zA-Z0-9_\-]+$'" @set-tags="opt.custom.tags = $event"></wb-tags-module>
                            <div class="description mt">* 无需输入<>&</>，输入标签名称即可，多个标签以空格或回车键分隔</div>
                        </td>
                    </tr>
                </table>

            </div>

            <div class="sc-header">
                <h3><strong>设定默认删除标签属性</strong></h3>
            </div>
            <div class="sc-body ">
                <table class="wbs-form-table">
                    <tbody>
                    <tr>
                        <th class="row w8em">常见标签属性</th>
                        <td>
                            <wb-selector-bar :cnf="cnf.attr" :opt="opt.attr" :format=false @change="opt.attr = $event"></wb-selector-bar>
                        </td>
                    </tr>
                    <tr>
                        <th class="row w8em">自定义</th>
                        <td>
                            <wb-tags-module v-bind:tags="opt.custom.attr" v-bind:all="allAttr" v-bind:format=false v-bind:rule="'^[a-zA-Z0-9_\-]+$'"  @set-tags="opt.custom.attr = $event"></wb-tags-module>
                            <div class="description mt">* 多个标签属性以空格或者回车键分隔</div>
                        </td>
                    </tr>
                </table>

            </div>

            <div class="sc-header">
                <h3><strong>代码格式优化</strong></h3>
            </div>
            <div class="sc-body ">
                <table class="wbs-form-table">
                    <tbody>
                    <tr>
                        <th class="row w8em">优化选项</th>
                        <td>
                            <div class="selector-bar">
                                <label class="block" v-for="(v,k) in cnf.format">
                                    <input type="checkbox" v-model="opt.format[k]" true-value=1 false-value=0 :checked="opt.format[k]">
                                    <span>{{v}}</span>
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>

            <more-wb-info v-bind:utm-source="pd_code"></more-wb-info>

        </div>
    </div>

    <div class="wb-copyright-bar">
        <div class="wbcb-inner">
            <a class="wb-logo" href="https://www.wbolt.com" data-wba-campaign="footer" title="WBOLT" target="_blank"><svg class="wb-icon sico-wb-logo"><use xlink:href="#sico-wb-logo"></use></svg></a>
            <div class="wb-desc">
                Made By <a href="https://www.wbolt.com" data-wba-campaign="footer" target="_blank">闪电博</a>
                <span class="wb-version">版本：<?php echo $pd_version;?></span>
            </div>
            <div class="ft-links">
                <a href="https://www.wbolt.com/plugins" data-wba-campaign="footer" target="_blank">免费插件</a>
                <a href="https://www.wbolt.com/knowledgebase" data-wba-campaign="footer" target="_blank">插件支持</a>
                <a href="<?php echo $pd_doc_url; ?>" data-wba-campaign="footer" target="_blank">说明文档</a>
                <a href="https://www.wbolt.com/terms-conditions" data-wba-campaign="footer" target="_blank">服务协议</a>
                <a href="https://www.wbolt.com/privacy-policy" data-wba-campaign="footer" target="_blank">隐私条例</a>
            </div>
        </div>
    </div>

    <div class="wbs-footer" id="optionsframework-submit">
        <div class="wbsf-inner">
            <div class="wbp-notice-bar">
                <p>温馨提示：此界面仅为插件设置默认值，编辑文章执行代码优化时，可临时修改优化参数。</p>
            </div>

            <button class="wbs-btn-primary" type="button" name="update" @click="updateData">保存设置</button>
        </div>
    </div>
</div>




