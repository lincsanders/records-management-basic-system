//
//  NSData+UTF8.h
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-26.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface NSData(UTF8)

- (NSString*) UTF8String;
- (NSData*) dataByHealingUTF8Stream;

@end
