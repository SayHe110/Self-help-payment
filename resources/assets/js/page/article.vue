<template>
    <div class="layout-box">
        <div class="layout-header">
            <a href="javascript:;" class="return"><Icon type="android-arrow-back" color="#fff" size="32"></Icon></a>
            <Dropdown class="menu"  placement="bottom-end">
                <a href="javascript:;"><Icon type="android-more-vertical" color="#fff" size="32"></Icon></a>
                <DropdownMenu slot="list">
                    <DropdownItem>驴打滚</DropdownItem>
                    <DropdownItem>炸酱面</DropdownItem>
                    <DropdownItem>豆汁儿</DropdownItem>
                </DropdownMenu>
            </Dropdown>
        </div>
        <div class="article-contain">
            <div class="article-title">
                <h2>国家电网公司积极推进10个城市世界一流城市配电网建设</h2>
                <p class="info">
                    <span>2017-12-27</span>
                    <span class="margin-left">admin</span>
                    <span class="margin-left">
                        <i class="iconfont icon-sannongguancha"> 90</i>
                    </span>
                </p>
            </div>
            <div class="article-box">
                <p>
                    8月17日，公司组织召开世界一流城市配电网建设推进电视电话会议，交流世界一流城市配电网建设管理工作经验，部署下阶段重点工作任务。会议要求，各单位要进一步增强责任感和紧迫感，准确把握世界一流城市配电网建设的实质，加快构建坚强合理的网架结构，积极推动配网设备技术升级，加强精益运维管理，提升智能互动服务水平，切实做到“结构好、设备好、技术好、管理好”。要加强建设实施过程管控，搭建工作交流平台，交流典型做法，展示建设进度和工作成效；构建评价指标体系，开展建设成效评估，积极运用配网资产国际对标成果，滚动优化实施方案。要加强组织领导，注重安全质量，做深做细项目需求储备，强化各级电科院、经研院（所）支撑保障，高效协调推进10个城市世界一流城市配电网建设，持续提升配电网建设运营管理水平。国网运检部、发展部、营销部、科技部，中国电科院、国网经研院在主会场参加会议。国网北京、天津、河北、山东、上海、江苏、浙江、福建电力及有关地市公司相关人员在各分会场参加会议。
                </p>
            </div>
        </div>
    </div>
</template>
<style>
.layout-header .return{
  float: left;
  line-height: 45px;
  position: absolute;
  left: 20px;
  top: 6px;
}
.layout-header .menu {
  float: right;
  position: absolute;
  right: 20px;
  top: 6px;
}
.layout-header .return img {
  width: 100%;
  height: 100%;
}
.article-title {
  text-align: left;
}
.article-title h2 {
  font-size: 18px;
  line-height: 1.5;
  font-weight: 600;
  color: #444;
  margin-bottom: 5px;
  text-align: left;
}
.article-title .info {
  color: #999;
  font-size: 12px;
  text-align: left;
  margin-bottom: 0px;
  border-bottom: 1px solid #eee;
  padding-bottom: 5px;
}
.article-title .info .margin-left {
  margin-left: 10px !important;
}
.article-box {
  width: 100%;
  max-width: 100%;
  font-size: 14px;
  line-height: 1.8;
  color: #666;
  word-wrap: break-word;
  text-align: justify;
  padding: 10px;
  text-indent: 2em;
}
</style>

