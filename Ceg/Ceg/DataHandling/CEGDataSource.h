//
//  CEGDataSource.h
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-26.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import <Foundation/Foundation.h>

enum kDownloadType {
    kVisitor = 0,
    kApprentice = 1
};

@interface CEGDataSource : NSObject <NSURLConnectionDelegate,NSURLConnectionDataDelegate>
{
    NSFetchedResultsController* _apprenticeFetchedResultsController;
    
    NSMutableData* _responseData;
}

- (NSFetchedResultsController*) visitorFetchedResultsControllerForTrainingId:(NSString*)tId;
- (NSManagedObject*) createFormFromApprentice:(NSManagedObject*)aApprentice andVisit:(NSManagedObject*)aVisit;


+ (CEGDataSource* ) sharedInstance;

@property (nonatomic,retain) NSFetchedResultsController* apprenticeFetchedResultsController;

@end
