cc.Class({
    extends: cc.Component,
 
    properties: {
        content : "1000",
        text_sprite:{
            default : null,
            type : cc.SpriteFrame,
        },
    },
 
    start()
    {
        this.setContent("8934873");
    },
 
    // 设置文本
    setContent(str)
    {
        this.content = str;
        this.onSetContentChange();
    },
 
    onSetContentChange()
    {
        this.createSpriteText();    
    },
 
    createSpriteText()
    {
        this.clearItem();
        var childs = this.node.children;
        var count = childs.length;
        for (let i = 0; i < this.content.length; i++)
        {
            var item = null;
            var sprite = null;
            if(i < count)
            {
                item = childs[i];
                item.active = true;
                sprite = item.getComponent(cc.Sprite);
            }
            else
            {
                item = new cc.Node("item");
                sprite = item.addComponent(cc.Sprite);
            }
            this.setSprite(this.content[i],sprite);
            item.parent = this.node;
        }
    },
 
    // 获取贴图
    getSprite(index)
    {
        var sprite = this.text_sprite.clone(); // 克隆一张图片
        var width = sprite.getRect().width/10;
        var height = sprite.getRect().height;
        var x = sprite.getRect().x + index * width;
        var y = sprite.getRect().y;
        var tmpRect = new cc.Rect(x,y,width,height);
        sprite.setRect(tmpRect);   // 设置 SpriteFrame 的纹理矩形区域
        return sprite;
    },
    // 设置贴图
    setSprite(value,sprite)
    {
        switch (value) {
            case "0":
                sprite.spriteFrame = this.getSprite(0);
                break;
            case "1":
                sprite.spriteFrame = this.getSprite(1);            
                break;
            case "2":
                sprite.spriteFrame = this.getSprite(2);                
                break;
            case "3":
                sprite.spriteFrame = this.getSprite(3);
                break;
            case "4":
                sprite.spriteFrame = this.getSprite(4);
                break;
            case "5":
                sprite.spriteFrame = this.getSprite(5);
                break;
            case "6":
                sprite.spriteFrame = this.getSprite(6);
                break;
            case "7":
                sprite.spriteFrame = this.getSprite(7);
                break;
            case "8":
                sprite.spriteFrame = this.getSprite(8);
                break;
            case "9":
                sprite.spriteFrame = this.getSprite(9);
                break;
            default:
                console.log("value not find :" + value);
                break;
        }        
    },
 
    clearItem()
    {
        var childs = this.node.children;
        for (let i = 0; i < childs.length; i++) {
            childs[i].active = false;
        }
    },
});
